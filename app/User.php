<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
	
    public $timestamps = false;        
    protected $table = 'korisnik';
    protected $primaryKey = 'korisnik_id';
   
    protected $fillable = [
        'ime', 'prezime', 'email', 'uloga_id'
    ];

    protected $hidden = [
        'password'
    ];

    public function rola(){
        return $this->hasOne('App\Uloge', 'id', 'uloga_id');
    }  

}
