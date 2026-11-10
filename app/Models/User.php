<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\hrm\Employee;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'avatar',
        'password',
        'status',
        'primary_role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function primaryRole(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'primary_role_id');
    }

    public function isActive(): bool
    {
        return $this->status === config('rbac.active_status', 'active');
    }

    public function primaryRoleName(): ?string
    {
        return user_primary_role($this);
    }

    public function rolePrefix(): ?string
    {
        return user_role_prefix($this);
    }
 public function contactPoints()
{
    return $this->hasMany(ContactPoint::class);
}

     public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function isStudent()
    {
        return $this->student()->exists();
    }

//     public function counsellor(): HasOne
// {
//     return $this->hasOne(Counsellor::class);
// }

// public static function createCounsellor(array $data): self
// {
//     $defaultRole = Role::where('name', 'default')
//         ->where('guard_name', config('rbac.default_guard', 'web'))
//         ->first();

//     if (! $defaultRole) {
//         throw new \RuntimeException('Default role not found.');
//     }

//     $user = self::create([
//         ...$data,
//         'primary_role_id' => $defaultRole->id,
//     ]);

//     // Assign default role to Spatie roles
//     $user->syncRoles([$defaultRole]);

//     return $user->load('roles', 'primaryRole');
// }
    public function employee(): HasOne
{
    return $this->hasOne(Employee::class);
}

public static function createEmployee(array $data): self
{
    $defaultRole = Role::where('name', 'default')
        ->where('guard_name', config('rbac.default_guard', 'web'))
        ->first();

    if (! $defaultRole) {
        throw new \RuntimeException('Default role not found.');
    }

    $user = self::create([
        ...$data,
        'primary_role_id' => $defaultRole->id,
    ]);

    // Assign default role to Spatie roles
    $user->syncRoles([$defaultRole]);

    return $user->load('roles', 'primaryRole');
}

}
