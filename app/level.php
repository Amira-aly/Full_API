<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class level extends Model
{
    protected $table = "levels";
    protected $fillable = ['title'];
}
