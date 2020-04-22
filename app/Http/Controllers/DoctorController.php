<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorRequest;

use App\Models\Doctor;
use App\Models\Specialty;

class DoctorController extends Controller
{

    private $objDoctor;

    public function __construct(){
        
        $this->objDoctor = new Doctor();
        $this->objSpecialty = new Specialty();

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
        $specialtys = $this->objSpecialty->get();

        return view('doctor.create', array(
            'title' => $title,
            'specialtys' => $specialtys,
        ));
    }

    public function store(DoctorRequest $request)
    {

        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:doctor',
            'specialty_id' => 'required',
        ]);

        $this->objDoctor->create([
            'name' => $request->name,
            'email' => $request->email,
            'specialty_id' => $request->specialty_id,             
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
        $specialtys = $this->objSpecialty->get();

        if(!$doctor) {
            return redirect('doctor');
        }

        return view('doctor.details', array(
            'title' => $title,
            'doctor' => $doctor,
            'specialtys' => $specialtys,
        ));            
    }

    public function update(DoctorRequest $request, $id)
    {
       
        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'specialty_id' => 'required',
        ]);

        $this->objDoctor->where(array('id' => $id))->update(array(
            'name' => $request->name,
            'email' => $request->email,
            'specialty_id' => $request->specialty_id,
        ));

        return redirect('doctor');
    }

    public function destroy($id)
    {
        $this->objDoctor->destroy($id);

        return redirect('doctor');
    }

    public function logout()
    {
        session()->forget('user');
        return redirect('auth');
    }

}
