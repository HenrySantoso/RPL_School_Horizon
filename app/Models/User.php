<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    //use HasFactory;
    use Notifiable;

    protected $fillable = [
        'name', 'password', 'role'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isStudent()
    {
        return $this->role === 'student';
    }
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}
