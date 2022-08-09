<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    protected $table = "ratings";
    protected $fillable = ['student_id','course_id','rate'];

    public function student(){
        return $this->hasMany(student::class ,'student_id');
    }

    public function course(){
        return $this->hasMany(course::class ,'course_id');
    }
}
