<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Korisnik extends Model
{
    use Notifiable;

    public $timestamps = false;        
    protected $table = 'korisnik';
    protected $primaryKey = 'korisnik_id';

	public function pacijenti() {
		return $this->hasMany('App\Pacijent', 'dodeljeni_lekar_id', 'korisnik_id');
    }
    
	public function pregledi() {
		return $this->hasMany('App\Pregledi', 'doktor_id', 'korisnik_id');
    }
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function rola(){
        return $this->hasOne('App\Uloge', 'id', 'uloga_id');
    }
        
}
