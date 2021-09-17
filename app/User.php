<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

   protected $fillable = [
        'name',
        'username',
        'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
