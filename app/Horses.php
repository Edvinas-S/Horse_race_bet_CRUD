<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horses extends Model
{
    public $fillable = [
        'name', 
        'runs', 
        'wins', 
        'about'];

    public function betters(){
        return $this->hasMany('App\Betters');
    }
}
