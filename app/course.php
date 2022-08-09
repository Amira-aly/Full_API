<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    protected $table = "courses";
    protected $fillable = ['name','link','image','admin_id','tracke_id','level_id'];

    public function admin(){
        return $this->belongsTo(admin::class ,'admin_id');
    }

    public function tracke(){
        return $this->belongsTo(tracke::class ,'tracke_id');
    }

    public function level(){
        return $this->belongsTo(level::class ,'level_id');
    }
}
