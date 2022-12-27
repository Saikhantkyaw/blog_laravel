<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class logout_controller extends Controller
{
    public function logout(){
        Auth::logout();
    return redirect('login');
    }
}
