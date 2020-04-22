<?php

namespace App\Http\Controllers;

use App\Http\Requests\SpecialtyRequest;

use App\Models\Specialty;

class SpecialtyController extends Controller
{

    private $objSpecialty;

    public function __construct(){
        
        $this->objSpecialty = new Specialty();

    }

    public function index()
    {

        if(!session()->has('user')){
            return redirect('auth');
        }
        
        $title = "Especialidade - LISTA";

        $specialtys = $this->objSpecialty->paginate(10);
        
        $session = session()->get('user');

        return view('specialty.index', array(
            'title' => $title,
            'specialtys' => $specialtys,
            'session' => $session
        ));
    }

    public function search(SpecialtyRequest $request)
    {

        if(!session()->has('user')){
            return redirect('auth');
        }

        $title = "Especialidade - PESQUISA";

        $s = $request->get('search');

        $specialtys = $this->objSpecialty->where('name', 'like', '%' . $s . '%')->paginate(10);

        return view('specialty.index', array(
            'title' => $title,
            'specialtys' => $specialtys,
        ));
    }

    public function create()
    {
        
        if(!session()->has('user')){
            return redirect('auth');
        }

        $title = "Especialidade - CADASTRO";

        return view('specialty.create', array(
            'title' => $title,
        ));
    }

    public function store(SpecialtyRequest $request)
    {

        $request->validate([
            'name' => 'required|min:3|max:255',
        ]);

        $this->objSpecialty->create([
            'name' => $request->name,
        ]);

        return redirect('specialty');

    }

    public function details($id)
    {
        
        if(!session()->has('user')){
            return redirect('auth');
        }

        $title = "Especialidade - DETALHES";

        $specialty = $this->objSpecialty->find($id);

        if(!$specialty) {
            return redirect('specialty');
        }

        return view('specialty.specialty', array(
            'title' => $title,
            'specialty' => $specialty,
        ));            
    }

    public function update(SpecialtyRequest $request, $id)
    {
       
        $request->validate([
            'name' => 'required|min:3|max:255',
            'status' => 'required',
        ]);

        $this->objSpecialty->where(array('id' => $id))->update(array(
            'name' => $request->name,
            'status' => $request->status,
        ));

        return redirect('specialty');
    }

    public function destroy($id)
    {
        $del = $this->objSpecialty->destroy($id);

        return response()->json(array(
            'fail' => $del ? false : true,
            'url' => url('specialty')
        ));
    }

}