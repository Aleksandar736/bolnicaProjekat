<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lekovi extends Model
{
    protected $table = 'lekovi';
    protected $primaryKey = 'lek_id';
    public $timestamps = false;
}