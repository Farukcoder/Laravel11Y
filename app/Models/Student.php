<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function contact()
    {
        return $this->hasOne(Contact::class);
    }

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_student');
    }

    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function companyInfoWithPhone()
    {
        return $this->hasOneThrough(PhoneNumber::class, Company::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function latestOrder()
    {
        return $this->hasOne(Order::class)->latestOfMany();
    }
    public function oldestOrder()
    {
        return $this->hasOne(Order::class)->oldestOfMany();
    }
    public function largestOrder()
    {
        return $this->hasOne(Order::class)->ofMany('amount', 'max');
    }
    public function smallestOrder()
    {
        return $this->hasOne(Order::class)->ofMany('amount', 'min');
    }

    public function countries()
    {
        return $this->belongsTo(Country::class, 'country_id','id');
    }

    public function studentWisePost()
    {
        return $this->hasMany(Post::class);
    }
}
