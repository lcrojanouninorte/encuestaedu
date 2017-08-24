<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
        	protected $fillable = ['survey_id','value', 'option_id' ];

    public function options(){
        return $this->belongsTo(Option::class, 'option_id');
    }
    public function surveys(){
        return $this->belongsTo(Survey::class);
    }
    
}
