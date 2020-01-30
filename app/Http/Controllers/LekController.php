<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\support\Facades\DB;
use App\Lekovi;

class LekController extends Controller
{
    public function lek_tabela(){
      $data = Lekovi::all();
      return view('/asistent/lekovi', ['data'=>$data]);
    }
    public function jedan_red_tab_lekovi($id){
      $niz = Lekovi::all();
      return $niz;
    }
    public function forma_lek_novi() {
      return view('/asistent/forma_lek', ['lek'=>new Lekovi()]);
    }
    public function forma_lek_stari($id){
      $lek = Lekovi::findOrFail($id);
      return view('/asistent/forma_lek', compact('lek'));
    }
    public function lek_novi(Request $request){
      $d = new Lekovi();
      $d->naziv = $request->naziv;
      $d->kolicina_na_zalihama = $request->kolicina_na_zalihama;
      $d->save();
      return redirect()->to('/asistent/lekovi');
    }
    public function lek_izmeni(Request $request){
      $d = Lekovi::find($request->lek_id); 
      $d->naziv = $request->naziv;
      $d->kolicina_na_zalihama = $request->kolicina_na_zalihama;
      $d->save();
      return redirect()->to('/asistent/lekovi');
    }
    public function lek_obrisi($lek_id){
      $lek = Lekovi::find($lek_id); 	
      $lek->delete(); 
      return redirect()->to('/asistent/lekovi');
    }     

    function action(Request $request)
    {

      $query = $request->get('query');
      if($query != '')
      {
        $data = Lekovi:: //DB::table('lekovi')
        where('naziv', 'like', '%'.$query.'%')
        ->orWhere('lek_id', 'like', '%'.$query.'%')        
        ->orderBy('lek_id', 'desc')
        ->get();
        
      }
      else
      {
      $data = Lekovi:: //DB::table('lekovi')
        orderBy('lek_id', 'desc')
        ->get();
      }

      return view('/asistent/lekovi', ['data'=>$data]);
  
    }
}
