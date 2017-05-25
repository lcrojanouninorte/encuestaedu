<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	protected $fillable = ['user_id','edad', 'institucion', 'curso' ];
    //
    public function user(){
        return $this->belongsTo(User::class);
    }
}
