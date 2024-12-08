<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GioithieuControlle extends Controller
{
    public function index()
    {
        return view('gioithieu.index');
    }

}
