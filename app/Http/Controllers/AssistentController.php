<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssistentController extends Controller
{
    public function assistentHome()
    {
        return view('asistentHome');
    }
}
