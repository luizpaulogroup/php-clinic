<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;

use App\Models\User;

class UserController extends Controller
{

    private $objUser;

    public function __construct(){
        
        $this->objUser = new User();

    }

    public function index()
    {

        if(!session()->has('user')){
            return redirect('auth');
        }
        
        $title = "Usuário - LISTA";

        $users = $this->objUser->paginate(10);
        
        $session = session()->get('user');

        return view('user.index', array(
            'title' => $title,
            'users' => $users,
            'session' => $session
        ));
    }

    public function search(UserRequest $request)
    {

        if(!session()->has('user')){
            return redirect('auth');
        }

        $title = "Usuário - PESQUISA";

        $s = $request->get('search');

        $users = $this->objUser->where('name', 'like', '%' . $s . '%')->paginate(10);

        return view('user.index', array(
            'title' => $title,
            'users' => $users,
        ));
    }

    public function create()
    {
        
        if(!session()->has('user')){
            return redirect('auth');
        }

        $title = "Usuário - CADASTRO";

        return view('user.create', array(
            'title' => $title,
        ));
    }

    public function store(UserRequest $request)
    {

        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:user',
        ]);

        $this->objUser->create([
            'name' => $request->name,
            'email' => $request->email,  
        ]);

        return redirect('user');

    }

    public function details($id)
    {
        
        if(!session()->has('user')){
            return redirect('auth');
        }

        $title = "Usuário - DETALHES";

        $user = $this->objUser->find($id);

        if(!$user) {
            return redirect('user');
        }

        return view('user.details', array(
            'title' => $title,
            'user' => $user,
        ));            
    }

    public function update(UserRequest $request, $id)
    {
       
        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
        ]);

        $this->objUser->where(array('id' => $id))->update(array(
            'name' => $request->name,
            'email' => $request->email,
        ));

        return redirect('user');
    }

    public function destroy($id)
    {
        $this->objUser->destroy($id);

        return redirect('user');
    }

    public function logout()
    {
        session()->forget('user');
        return redirect('auth');
    }

}
