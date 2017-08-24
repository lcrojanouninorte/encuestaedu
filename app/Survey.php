<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    //
    protected $fillable = ['user_id'];


    public function answers(){
        return $this->hasMany(Answer::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
