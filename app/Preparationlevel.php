<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preparationlevel extends Model
{
    //

    public function cnos(){
        return $this->hasMany(Cno::class, "nivel");
    }
}
