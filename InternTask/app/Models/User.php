<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    // protected $guarded = [];

    // The attributes that are mass assignable.
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
        'dob',
        'age',
        'gender',
        'job',

        'remember_token',

    ];


    // The attributes that should be hidden for serialization.
    protected $hidden = [
        'password',
        'remember_token',
    ];


    // Get the attributes that should be cast.
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
