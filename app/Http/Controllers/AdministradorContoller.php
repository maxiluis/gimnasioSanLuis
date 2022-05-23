<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministradorContoller extends Controller
{
    //
    public function index()
    {
        return view('layouts.administrador');
    }
}
