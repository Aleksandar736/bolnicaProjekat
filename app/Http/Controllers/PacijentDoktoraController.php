<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pacijent;
use App\Korisnik;
//use Illuminate\support\Facades\DB;

class PacijentDoktoraController extends Controller
{
    public function pacijent(){
        $data = Pacijent::all();
        return view('/lekar/pacijent_doktora', ['data'=>$data]);
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
 
       return view('/lekar/pacijent_doktora', ['data'=>$data]);
 
    }

}
