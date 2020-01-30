<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pacijent;
use App\Korisnik;
//use Illuminate\support\Facades\DB;

class PacijentController extends Controller
{
    public function pacijent(){
        $data = Pacijent::all();
        return view('/asistent/pacijent', ['data'=>$data]);
    }

//    public function jedan_red($id){
//        $niz = Pacijent::all();
//        return $niz;
//    }

    public function forma_pacijent_novi() {
    //return view('forma_pacijent', ['pacijent'=>new Pacijent()]);
    $doktori = Korisnik::where('uloga_id', '3')->get();
    $pol = Pacijent::all();
    return view('/asistent/forma_pacijent', ['pacijent'=>new Pacijent(), 'doktori'=>$doktori,'pol'=>$pol]);    
    }

    public function forma_pacijent_stari($id){
    //$pacijent = Pacijent::findOrFail($id);
    //return view('forma_pacijent', compact('pacijent'));
    $pacijent = Pacijent::findOrFail($id);
    $doktori = Korisnik::where('uloga_id', '3')->get();
    $pol = Pacijent::all();
    return view('/asistent/forma_pacijent', compact('pacijent', 'doktori','pol'));
    //['osoba'=>$osoba]);
    //where('id', $id)->get();
    //find($id);
    //where('ime', 'LIKE', '%'.$vr.'%')    
    }

    public function pacijent_novi(Request $request){
    //return $request->all();
    $d = new Pacijent();
    $d->ime_pacijenta = $request->ime_pacijenta;
    $d->prezime_pacijenta = $request->prezime_pacijenta;
    $d->email_pacijenta = $request->email_pacijenta;
    $d->datum_rodjenja = $request->datum_rodjenja;
    $d->pol = $request->pol;
    $d->adresa = $request->adresa;
    $d->dodeljeni_lekar_id = $request->dodeljeni_lekar_id;
    $d->datum_dodele_lekara = $request->datum_dodele_lekara;
    $d->lbo = $request->lbo;
    $d->save();
    return redirect()->to('/asistent/pacijent');
    }

    public function pacijent_update(Request $request){
    //return $request->all();
    $d = Pacijent::find($request->pacijent_id);
    $d->ime_pacijenta = $request->ime_pacijenta;
    $d->prezime_pacijenta = $request->prezime_pacijenta;
    $d->email_pacijenta = $request->email_pacijenta;
    $d->datum_rodjenja = $request->datum_rodjenja;
    $d->pol = $request->pol;
    $d->adresa = $request->adresa;
    $d->dodeljeni_lekar_id = $request->dodeljeni_lekar_id;
    $d->datum_dodele_lekara = $request->datum_dodele_lekara;
    $d->lbo = $request->lbo;
    $d->save();
    return redirect()->to('/asistent/pacijent');
    }

    public function pacijent_delete($id){
    $pacijent = Pacijent::find($id);
    $pacijent->delete();
    return redirect()->to('/asistent/pacijent');
    }

    function action(Request $request)
    {
 
       $query = $request->get('query');
       if($query != '')
       {
       $data = Pacijent:: //DB::table('pacijent')
          where('ime_pacijenta', 'like', '%'.$query.'%')
        ->orWhere('prezime_pacijenta', 'like', '%'.$query.'%')
        ->orWhere('email_pacijenta', 'like', '%'.$query.'%')
        ->orWhere('datum_rodjenja', 'like', '%'.$query.'%')
        ->orWhere('adresa', 'like', '%'.$query.'%')
        ->orWhere('lbo', 'like', '%'.$query.'%')
        ->orderBy('pacijent_id', 'desc')
        ->get();
          
       }
       else
       {
       $data = Pacijent::  //DB::table('pacijent')
          orderBy('pacijent_id', 'desc')
          ->get();
       }
 
       return view('/asistent/pacijent', ['data'=>$data]);
 
    }

}
