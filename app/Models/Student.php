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
}
