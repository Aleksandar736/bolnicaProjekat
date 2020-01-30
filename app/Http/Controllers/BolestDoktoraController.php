<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\support\Facades\DB;
use App\Bolest;

class BolestDoktoraController extends Controller
{   
    public function bolest_tabela(){
        //$niz = DB::select("select * from bolest where bolest_id=$id");
        $data = Bolest::all();
        return view('/lekar/bolest_doktora', ['data'=>$data]);// $niz;
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

    return view('/lekar/bolest_doktora', ['data'=>$data]);

    }
}
