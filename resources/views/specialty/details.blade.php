@extends('templates.template')

@section('content')
<div class="container-fluid specialty-details">
    <div>
        <a href="{{url("specialty")}}" type="button" class="btn font-weight-bold btn-pattern">Voltar</a>
    </div>
    <span class="title-page">Editar</span>

    @if(isset($errors) && count($errors) > 0)
        <div class="alert alert-danger mt-2" role="alert">
            @foreach($errors->all() as $erro)
                {{$erro}} <br>
            @endforeach
        </div>
    @endif

    <form method="post" action="{{url("specialty/update/$specialty->id")}}">
        @method('PATCH')
        @csrf
        <div class="row">
            <div class="form-group col-md-12">
                <label class="font-weight-bold text-uppercase">name</label>
                <input type="text" name="name" class="form-control text-uppercase" value="{{$specialty->name}}">
            </div>
            <div class="form-group col-md-12">
                <button type="submit" class="btn btn-block btn-success font-weight-bold">Salvar</button>
            </div>
        </div>
    </form>

</div>
@endsection