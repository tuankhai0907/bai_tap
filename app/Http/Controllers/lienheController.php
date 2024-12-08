<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Http\Request;

class lienheController extends Controller
{
    public function index()
    {
        return view('lienhe.lienhe');
    }
}
