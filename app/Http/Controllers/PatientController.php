<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;

use App\Models\Patient;

class PatientController extends Controller
{

    private $objPatient;

    public function __construct(){
        
        $this->objPatient = new Patient();

    }

    public function index()
    {

        if(!session()->has('user')){
            return redirect('auth');
        }
        
        $title = "Paciente - LISTA";

        $patients = $this->objPatient->paginate(10);
        
        $session = session()->get('user');

        return view('patient.index', array(
            'title' => $title,
            'patients' => $patients,
            'session' => $session
        ));
    }

    public function search(PatientRequest $request)
    {

        if(!session()->has('user')){
            return redirect('auth');
        }

        $title = "Paciente - PESQUISA";

        $s = $request->get('search');

        $patients = $this->objPatient->where('name', 'like', '%' . $s . '%')->paginate(10);

        return view('patient.index', array(
            'title' => $title,
            'patients' => $patients,
        ));
    }

    public function create()
    {
        
        if(!session()->has('user')){
            return redirect('auth');
        }

        $title = "Paciente - CADASTRO";

        return view('patient.create', array(
            'title' => $title,
        ));
    }

    public function store(PatientRequest $request)
    {

        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:patient',
        ]);

        $this->objPatient->create([
            'name' => $request->name,
            'email' => $request->email,            
        ]);

        return redirect('patient');

    }

    public function details($id)
    {
        
        if(!session()->has('user')){
            return redirect('auth');
        }

        $title = "Paciente - DETALHES";

        $patient = $this->objPatient->find($id);

        if(!$patient) {
            return redirect('patient');
        }

        return view('patient.details', array(
            'title' => $title,
            'patient' => $patient,
        ));            
    }

    public function update(PatientRequest $request, $id)
    {
       
        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
        ]);

        $this->objPatient->where(array('id' => $id))->update(array(
            'name' => $request->name,
            'email' => $request->email,
        ));

        return redirect('patient');
    }

    public function destroy($id)
    {
        $this->objPatient->destroy($id);

        return redirect('patient');
    }

}