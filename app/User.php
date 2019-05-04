<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'phone', 'gender', 'age'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Answers()
    {
        return $this->hasMany('App\Answer');
    }

    public function OldAnswers()
    {
        return $this->hasMany('App\OldAnswer');
    }
}
