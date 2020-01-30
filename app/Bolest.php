<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bolest extends Model
{
    protected $table = 'bolest';
    protected $primaryKey = 'bolest_id';
    public $timestamps = false;

    public function pregledi() {
    return $this->hasMany('App\Pregledi', 'bolest_id', 'bolest_id');
    }
}