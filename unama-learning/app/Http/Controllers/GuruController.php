<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    //
    public function beranda(){
        return view('guru.beranda');
    }
}
