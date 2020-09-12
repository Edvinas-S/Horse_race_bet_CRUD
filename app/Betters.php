<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Betters extends Model
{
    public $fillable = [
        'name', 
        'surname', 
        'bet', 
        'horse_id'];

    public function horses(){
        return $this->belongsTo('App\Horses', 'horse_id');
    }
}
