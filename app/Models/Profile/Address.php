<?php

namespace App\Models\Profile;

use App\Models\City;
use App\Models\Country;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'student_id',
        'type',
        'address',
        'city_id',
        'country_id',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}