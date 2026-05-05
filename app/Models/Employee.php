<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'position', 'contact'];

    protected $hidden = ['password', 'remember_token'];
}