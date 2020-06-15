<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
  

    // One to Many RelationShip 
    public function childs() {
        return $this->hasMany('App\Menu','parent','id') ;
    }
}
