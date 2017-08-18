<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descoutput extends Model
{
    //
    public function outputs(){
        return $this->hasMany(Output::class, 'onet', 'onet');
    }
}
