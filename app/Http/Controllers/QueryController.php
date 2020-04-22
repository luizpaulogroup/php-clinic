<?php

namespace App\Http\Controllers;

use App\Http\Requests\QueryRequest;

use App\Models\Query;
use App\Models\Patient;
use App\Models\Doctor;

class QueryController extends Controller
{

    private $objQuery;

    public function __construct(){
        
        $this->objQuery = new Query();
        $this->objPatient = new Patient();
        $this->objDoctor = new Doctor();

    }

    public function index()
    {

        if(!session()->has('user')){
            return redirect('auth');
        }
        
        $title = "Consulta - LISTA";

        $querys =  $this->objQuery
            ->join('patient', 'patient.id', '=', 'query.patient_id')
            ->join('doctor', 'doctor.id', '=', 'query.doctor_id')
            ->select('query.*', 'patient.name AS patient_name', 'doctor.name AS doctor_name')
            ->paginate(10);

        $session = session()->get('user');

        return view('query.index', array(
            'title' => $title,
            'querys' => $querys,
            'session' => $session
        ));
    }

    public function search(QueryRequest $request)
    {

        if(!session()->has('user')){
            return redirect('auth');
        }

        $title = "Consulta - PESQUISA";

        $s = $request->get('search');

        $querys =  $this->objQuery
            ->join('patient', 'patient.id', '=', 'query.patient_id')
            ->join('doctor', 'doctor.id', '=', 'query.doctor_id')
            ->select('query.*', 'patient.name AS patient_name', 'doctor.name AS doctor_name')
            ->where('patient.name', 'like', '%' . $s . '%')
            ->paginate(10);

        return view('query.index', array(
            'title' => $title,
            'querys' => $querys,
        ));
    }

    public function create()
    {
        
        if(!session()->has('user')){
            return redirect('auth');
        }

        $title = "Consulta - CADASTRO";

        $patients = $this->objPatient->get();
        
        $doctors = $this->objDoctor->get();

        return view('query.create', array(
            'title' => $title,
            'patients' => $patients,
            'doctors' => $doctors,
        ));
    }

    public function store(QueryRequest $request)
    {

        $request->validate([
            'patient_id' => 'required',
            'doctor_id' => 'required',
            'status' => 'required',
        ]);

        $product = $this->objDoctor->where('id', $request->doctor_id)->first();

        if(!$product){
            return redirect('query/create');
        }

        $this->objQuery->create([
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'value' => $product->value,
            'status' => $request->status,             
        ]);

        return redirect('query');

    }

    public function details($id)
    {
        
        if(!session()->has('user')){
            return redirect('auth');
        }

        $title = "Consulta - DETALHES";

        $query =  $this->objQuery
            ->join('patient', 'patient.id', '=', 'query.patient_id')
            ->join('doctor', 'doctor.id', '=', 'query.doctor_id')
            ->select('query.*', 'patient.name AS patient_name', 'doctor.name AS doctor_name')
            ->where('query.id', $id)
            ->first();

        if(!$query) {
            return redirect('query');
        }

        return view('query.query', array(
            'title' => $title,
            'query' => $query,
        ));            
    }

    public function update(QueryRequest $request, $id)
    {
       
        $request->validate([
            'status' => 'required',
        ]);

        $this->objQuery->where(array('id' => $id))->update(array(
            'status' => $request->status,
        ));

        return redirect('query');
    }

    public function destroy($id)
    {
        $del = $this->objQuery->destroy($id);

        return response()->json(array(
            'fail' => $del ? false : true,
            'url' => url('query')
        ));
    }

    protected function money($value)
    {

        $value = str_replace('.', '', $value);
        $value = str_replace(',', '.', $value);

        return $value;
    }
    
}