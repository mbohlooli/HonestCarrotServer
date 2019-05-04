<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    protected $fillable = ['Q1', 'Q2'];

    public function Answer()
    {
        return $this->hasMany('App\Answer');
    }

    public function OldAnswer()
    {
        return $this->hasMany('App\OldAnswer');
    }
}
