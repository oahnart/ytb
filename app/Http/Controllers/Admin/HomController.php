<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomController extends Controller
{
    //
    public function getHome(){
        return view('backend.index');
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->intended('login');
    }
}
