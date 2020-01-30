<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregledi extends Model
{
    protected $table = 'pregledi';
    protected $primaryKey = 'pregledi_id';
    public $timestamps = false;  

    public function lekar() {
        return $this->hasOne('App\Korisnik', 'korisnik_id', 'doktor_id');
    }

    public function pacijent() {
        return $this->hasOne('App\Pacijent', 'pacijent_id', 'pacijent_id');
    }

    public function bolest() {
        return $this->hasOne('App\Bolest', 'bolest_id', 'bolest_id');
    }
    
    public function uput() {
        return $this->hasOne('App\SpecPregled', 'uput_id', 'uput_id');
    }

    public function lekovi() {
        // return $this->belongsToMany(DRUGI_MODEL, PIVOT_TABELA, PIVOT_KLJUC_OVOG_MODELA, PIVOT_KLJUC_DRUGOG_MODELA);
        return $this->belongsToMany('App\Lekovi', 'prepisani_lekovi', 'pregled_id', 'lek_id')->withPivot('kolicina');
    }
}