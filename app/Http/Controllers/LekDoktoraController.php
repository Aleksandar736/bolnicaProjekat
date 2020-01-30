<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\support\Facades\DB;
use App\Lekovi;

class LekDoktoraController extends Controller
{
    public function lek_tabela(){
      $data = Lekovi::all();
      return view('/lekar/lekovi_doktora', ['data'=>$data]);
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

      return view('/lekar/lekovi_doktora', ['data'=>$data]);
  
    }
}
