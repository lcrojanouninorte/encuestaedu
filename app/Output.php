<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Output extends Model
{
    //
     public function cnos(){
        return $this->belongsTo(Cno::class, 'onet', 'onet');
    }

    public function descoutput(){
        return $this->belongsTo(Descoutput::class, 'onet', 'onet');
    }
}
