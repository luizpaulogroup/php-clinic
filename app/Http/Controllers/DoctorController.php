<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorRequest;

use App\Models\Doctor;

class DoctorController extends Controller
{

    private $objDoctor;

    public function __construct(){
        
        $this->objDoctor = new Doctor();

    }

    public function index()
    {

        if(!session()->has('user')){
            return redirect('auth');
        }
        
        $title = "Doutor - LISTA";

        $doctors = $this->objDoctor->paginate(10);
        
        $session = session()->get('user');

        return view('doctor.index', array(
            'title' => $title,
            'doctors' => $doctors,
            'session' => $session
        ));
    }

    public function search(DoctorRequest $request)
    {

        if(!session()->has('user')){
            return redirect('auth');
        }

        $title = "Doutor - PESQUISA";

        $s = $request->get('search');

        $doctors = $this->objDoctor->where('name', 'like', '%' . $s . '%')->paginate(10);

        return view('doctor.index', array(
            'title' => $title,
            'doctors' => $doctors,
        ));
    }

    public function create()
    {
        
        if(!session()->has('user')){
            return redirect('auth');
        }

        $title = "Doutor - CADASTRO";

        return view('doctor.create', array(
            'title' => $title,
        ));
    }

    public function store(DoctorRequest $request)
    {

        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:client',
            'status' => 'required',
        ]);

        $this->objDoctor->create([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,             
        ]);

        return redirect('doctor');

    }

    public function details($id)
    {
        
        if(!session()->has('user')){
            return redirect('auth');
        }

        $title = "Doutor - DETALHES";

        $doctor = $this->objDoctor->find($id);

        if(!$doctor) {
            return redirect('doctor');
        }

        return view('doctor.doctor', array(
            'title' => $title,
            'doctor' => $doctor,
        ));            
    }

    public function update(DoctorRequest $request, $id)
    {
       
        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'status' => 'required',
        ]);

        $this->objDoctor->where(array('id' => $id))->update(array(
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
        ));

        return redirect('doctor');
    }

    public function destroy($id)
    {
        $del = $this->objDoctor->destroy($id);

        return response()->json(array(
            'fail' => $del ? false : true,
            'url' => url('doctor')
        ));
    }

    public function logout()
    {
        session()->forget('user');
        return redirect('auth');
    }

}
