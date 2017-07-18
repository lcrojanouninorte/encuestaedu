<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cno extends Model
{
    //
    public function preparationlevels(){
        return $this->belongsTo(Preparationlevel::class, 'id', 'nivel');
    }
    public function skills(){
        return $this->hasMany(Skill::class, 'cod_profesion', 'cod_profesion');
    }
    public function knowledges(){
        return $this->hasMany(Knowledge::class, 'cod_profesion', 'cod_profesion');
    }
    public function outputs(){
        return $this->hasMany(Output::class, 'cod_area', 'cod_area');
    }
}

