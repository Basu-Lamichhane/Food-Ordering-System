<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function home()
    {

        if (auth()->user()->role == 0)
        {
            return redirect('/');
        }
        elseif(auth()->user()->role == 1){
            return redirect('/admin');
        }
        elseif (auth()->user()->role == 2) {
            return redirect('/kitchen');
        }
        elseif (auth()->user()->role == 3){
            return redirect('/delivery');
        }
        else{
            abort(404);
        }
           

        
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
