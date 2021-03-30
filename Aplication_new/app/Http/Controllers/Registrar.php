<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Registrar extends Controller
{
    public function index(Request $request)
    {   
        $registrar = true;
        return view('index', compact('registrar'));
    }
}
