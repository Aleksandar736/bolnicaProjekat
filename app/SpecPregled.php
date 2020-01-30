<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecPregled extends Model
{
    protected $table = 'spec_pregled';
    protected $primaryKey = 'uput_id';
    public $timestamps = false;

    public function pregledi() {
        return $this->hasMany('App\Pregledi', 'uput_id', 'uput_id');
    }
}