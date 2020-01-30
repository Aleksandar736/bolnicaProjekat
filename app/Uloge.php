<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uloge extends Model
{
    protected $table = 'uloge';

    public function korisnik(){
        return $this->hasOne('App\Korisnik', 'uloga_id', 'id');
    }
    public function user(){
        return $this->hasOne('App\User', 'uloga_id', 'id');
    }            
}
