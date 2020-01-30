<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pacijent extends Model
{
    public $timestamps = false;
    protected $table='pacijent';
    protected $primaryKey="pacijent_id";

    public function lekar() {
		  return $this->hasOne('App\Korisnik', 'korisnik_id', 'dodeljeni_lekar_id');
  	}
    
    public function pregledi() {
      return $this->hasMany('App\Pregledi', 'pacijent_id', 'pacijent_id');
    }
}
