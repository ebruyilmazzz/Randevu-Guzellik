<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HizmetController extends Controller
{
    public function index()
    {
        return view('hizmet');
    }

    public function ekip()
    {
        return view('ekip');
    }
}