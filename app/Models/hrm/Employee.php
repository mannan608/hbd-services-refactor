<?php

namespace App\Models\hrm;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',   
        // Personal
        'first_name',
        'last_name',
        'date_of_birth',
        'gender',
        'religion',
        'blood_group',
        'national_id',
        'address',
        'bio',
        'education',
        'institution',
        'experience_years',
        'languages',
        'expertise',
        'emergency_contact_name',
        'emergency_contact_phone',
        'city_id',
        'country_id',
        'is_verified',
    ];

    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
            'experience_years' => 'integer',
            'languages' => 'array',
            'expertise' => 'array',
            'is_verified' => 'boolean',
        ];
    }

    // Login account
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }   

    // Employment history
    public function employments(): HasMany
    {
        return $this->hasMany(Employment::class);
    }

    // Current employment
    public function currentEmployment(): HasOne
{
    return $this->hasOne(Employment::class)
        ->where('is_current', true)
        ->latestOfMany();
}

    // Salary history
    public function salaryHistories(): HasMany
    {
        return $this->hasMany(SalaryHistory::class);
    }

    // Bank accounts
    public function bankAccounts(): HasMany
    {
        return $this->hasMany(BankAccount::class);
    }

    // Primary bank account
    public function primaryBankAccount(): HasOne
    {
        return $this->hasOne(BankAccount::class)
            ->where('is_primary', true);
    }

    // Documents
    public function documents(): HasMany
    {
        return $this->hasMany(EmployeeDocument::class);
    }

    // Full name accessor
    public function getFullNameAttribute(): string
    {
        return trim($this->first_name . ' ' . $this->last_name);
    }
    public function country(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Country::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(\App\Models\City::class);
    }

}
