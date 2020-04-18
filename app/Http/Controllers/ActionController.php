<?php

namespace App\Http\Controllers;

class ActionController extends Controller
{

    public function logout()
    {
        session()->forget('user');
        return redirect('auth');
    }

}
