<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;

use App\Models\User;

class AuthController extends Controller
{

    private $objUser;

    public function __construct(){
        
        $this->objUser = new User();

    }

    public function index()
    {
        
        if(session()->has('user')){
            return redirect('query');
        }

        $title = "SignIn";

        return view('auth.index', array(
            'title' => $title,
        ));
    }

    public function init(UserRequest $request)
    {

        $title = "SignIn";

        $email = $request->email;
        $password = $request->password;

        $admin = $this->objUser
            ->where('email', $email)
            ->where('password', $password)
            ->where('status', 'A')
            ->first();

        if(!$admin){
            return view('auth.index', array(
                'title' => $title,
            ));
        }

        $request->session()->put('user', array(
            'id' => $admin->id,
            'name' => $admin->name,
            'email' => $admin->email,
        ));

        return redirect('query');

    }

}