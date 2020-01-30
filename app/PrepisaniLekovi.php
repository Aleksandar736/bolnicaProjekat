<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrepisaniLekovi extends Model
{
    protected $table = 'prepisani_lekovi';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
