<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tracke extends Model
{
    protected $table = "trackes";
    protected $fillable = ['title', 'desciption'];
}
