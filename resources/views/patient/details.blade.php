@extends('templates.template')

@section('content')
<div class="container-fluid patient-details">
    <div>
        <a href="{{url("patient")}}" type="button" class="btn font-weight-bold btn-pattern">Voltar</a>
    </div>
    <span class="title-page">Editar</span>

    @if(isset($errors) && count($errors) > 0)
        <div class="alert alert-danger mt-2" role="alert">
            @foreach($errors->all() as $erro)
                {{$erro}} <br>
            @endforeach
        </div>
    @endif

    <form method="post" action="{{url("patient/update/$patient->id")}}">
        @method('PATCH')
        @csrf
        <div class="row">
            <div class="form-group col-md-12">
                <label class="font-weight-bold text-uppercase">Nome</label>
                <input type="hidden" name="id" class="form-control" value="{{$patient->id}}">
                <input autocomplete="off" type="text" name="name" class="form-control" value="{{$patient->name}}" required minlength="3">
            </div>
            <div class="form-group col-md-12">
                <label class="font-weight-bold text-uppercase">E-mail</label>
                <input autocomplete="off" type="text" name="email" class="form-control" value="{{$patient->email}}" required>
            </div>
            <div class="form-group col-md-6">
                <label class="font-weight-bold text-uppercase">Última alteração</label>
                <input disabled type="text" name="created_at" class="form-control" value="{{$patient->created_at}}">
            </div>
            <div class="form-group col-md-6">
                <label class="font-weight-bold text-uppercase">Data de cadastro</label>
                <input disabled type="text" name="updated_at" class="form-control" value="{{$patient->updated_at}}">
            </div>
            <div class="form-group col-md-12">
                <button type="submit" class="btn btn-block btn-success font-weight-bold">Salvar</button>
            </div>
        </div>
    </form>
</div>
@endsection