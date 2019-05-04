<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OldAnswer extends Model
{
    protected $table = 'oldanswers';
    protected $fillable = ['aid', 'correct'];
}
