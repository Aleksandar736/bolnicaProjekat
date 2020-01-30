<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\support\Facades\DB;
use App\Bolest;

class BolestController extends Controller
{   
    public function bolest_tabela(){
        //$niz = DB::select("select * from bolest where bolest_id=$id");
        $data = Bolest::all();
        return view('/asistent/bolest', ['data'=>$data]);// $niz;
     }
     public function jedan_red_bolest($id){
        $niz = Bolest::all();
         return $niz;
     }
     public function forma_bolest_nova() {
        return view('/asistent/forma_bolest', ['bolest'=>new Bolest()]);
     }
     public function forma_bolest_stara($id){
        $bolest = Bolest::findOrFail($id);
        return view('/asistent/forma_bolest', compact('bolest'));//['bolest'=>$bolest]);
        //where('id', $id)->get();
        //find($id); 
            //where('ime', 'LIKE', '%'.$vr.'%')
        
        //
     }
     public function bolest_nova(Request $request){
        //return $request->all();
        $d = new Bolest();
        $d->naziv = $request->naziv;
        $d->opis = $request->opis;      
        $d->save();
        return redirect()->to('/asistent/bolest');
     }
     public function bolest_izmeni(Request $request){
        //return $request->all();
        $d = Bolest::find($request->bolest_id); 
        $d->naziv = $request->naziv;
        $d->opis = $request->opis;         
        $d->save();
        return redirect()->to('/asistent/bolest');
     }
     public function bolest_obrisi($bolest_id){
        $bolest = Bolest::find($bolest_id); 	
        $bolest->delete(); 
        return redirect()->to('/asistent/bolest');
     }     

     function action(Request $request)
     {

       $query = $request->get('query');
       if($query != '')
       {
         $data = Bolest:: //DB::table('bolest')
         where('naziv', 'like', '%'.$query.'%')
         ->orWhere('bolest_id', 'like', '%'.$query.'%')
         ->orderBy('bolest_id', 'desc')
         ->get();
          
       }
       else
       {
        $data = Bolest::  //DB::table('bolest')
          orderBy('bolest_id', 'desc')
          ->get();
       }
 
       return view('/asistent/bolest', ['data'=>$data]);
  
     }
}
