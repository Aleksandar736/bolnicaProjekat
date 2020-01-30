<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\support\Facades\DB;
use App\Korisnik;
use App\Uloge;

class KorisnikController extends Controller
{   
   public function korisnik_tabela(){
      //$niz = DB::select("select * from korisnik where korisnik_id=$id");
      $data = Korisnik::all();
      return view('/admin/korisnik', ['data'=>$data]);//   $niz;
   }
//   public function jedan_red($id){
//      $niz = Korisnik::all();
//      return $niz;
//   }
   public function forma_korisnik_novi() {
      $uloge=Uloge::all();
      return view('/admin/forma_korisnik', ['korisnik'=>new Korisnik(),'uloge'=>$uloge]);
   }
   public function forma_korisnik_stari($id){
      $korisnik = Korisnik::findOrFail($id);
      $uloge=Uloge::all();
      return view('/admin/forma_korisnik', compact('korisnik','uloge'));//['korisnik'=>$korisnik]);
      //where('id', $id)->get();
      //find($id); 
         //where('ime', 'LIKE', '%'.$vr.'%')        
      //
   }
   public function korisnik_novi(Request $request){
      //return $request->all();
      $d = new Korisnik();
      $d->ime = $request->ime;
      $d->prezime = $request->prezime;
      $d->email = $request->email;
      // $d->username = $request->username;
      // $d->kolona u tabeli korisnik = $request->name ili id u forma_korisnik;      
      $d->password = $request->password;
      $d->uloga_id = $request->uloga;        
      $d->save();
      return redirect()->to('/admin/korisnik');
   }
   public function korisnik_update(Request $request){
      //return $request->all();
      $d = Korisnik::find($request->korisnik_id); 
      $d->ime = $request->ime;
      $d->prezime = $request->prezime;
      $d->email = $request->email;
      // $d->username = $request->username;
      // $d->kolona u tabeli korisnik = $request->name ili id u forma_korisnik;
      $d->password = $request->password;
      $d->uloga_id = $request->uloga;          
      $d->save();
      return redirect()->to('/admin/korisnik');
   }
   public function korisnik_delete($korisnik_id){
      $korisnik = Korisnik::find($korisnik_id); 	
      $korisnik->delete(); 
      return redirect()->to('/admin/korisnik');
   }   

   function action(Request $request)
   {

      $query = $request->get('query');
      if($query != '')
      {
      $data = Korisnik::
      where('korisnik_id', 'like', '%'.$query.'%')
      ->orWhere('ime', 'like', '%'.$query.'%')
      ->orWhere('prezime', 'like', '%'.$query.'%')
      ->orWhere('email', 'like', '%'.$query.'%')
//      ->orWhere('username', 'like', '%'.$query.'%')
//      ->orWhere('uloga_id', 'like', '%'.$query.'%')
      ->orderBy('korisnik_id', 'desc')
      ->get();
         
      }
      else
      {
      $data = Korisnik::
         orderBy('korisnik_id', 'desc')
         ->get();
      }

      return view('/admin/korisnik', ['data'=>$data]);

   }

}
