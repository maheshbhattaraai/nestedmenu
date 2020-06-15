<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
   //Accessor
    public function getParentAttribute($value)
    {
        return $value??0;
    }

    // One to Many RelationShip 
    public function childs() {
        return $this->hasMany('App\Menu','parent','id') ;
    }
}
