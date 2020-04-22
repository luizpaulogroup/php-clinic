@extends('templates.template')

@section('content')
<div class="container-fluid query-create">
    <div>
        <a href="{{url("query")}}" type="button" class="btn font-weight-bold btn-pattern">Listar</a>
    </div>
    <span class="title-page">Cadastro</span>
    
    @if(isset($errors) && count($errors) > 0)
        <div class="alert alert-danger mt-2" role="alert">
            @foreach($errors->all() as $erro)
                {{$erro}} <br>
            @endforeach
        </div>
    @endif

    <form method="post" action="{{url("query/store")}}">
        @method('POST')
        @csrf
        <div class="row">
            <div class="form-group col-md-12">
                <label class="font-weight-bold text-uppercase">Paciente</label>
                <select name="patient_id" class="form-control" required>
                    <option value="">SELECIONE...</option>
                    @foreach($patients as $patient)
                        <option class="text-uppercase" value="{{$patient->id}}">{{$patient->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-12">
                <label class="font-weight-bold text-uppercase">Doutor</label>
                <select name="doctor_id" class="form-control" required>
                    <option value="">SELECIONE...</option>
                    @foreach($doctors as $doctor)
                        <option class="text-uppercase" value="{{$doctor->id}}">{{$doctor->name}} - R$ {{number_format($product->value, 2, ',', '.')}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-12">
                <label class="font-weight-bold text-uppercase">Doutor</label>
                <input type="datetime-local" name="date" class="form-control">
            </div>
            <div class="form-group col-md-12">
                <label class="font-weight-bold text-uppercase">Status</label>
                <select name="status" class="form-control" required>
                    <option value="">SELECIONE...</option>
                    <option value="A">ATIVO</option>
                    <option value="I">INATIVO</option>
                </select>
            </div>
            <div class="form-group col-md-12">
                <button type="submit" class="btn btn-block btn-success font-weight-bold">Salvar</button>
            </div>
        </div>
    </form>

</div>
@endsection