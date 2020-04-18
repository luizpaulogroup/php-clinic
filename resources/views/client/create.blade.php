@extends('templates.template')

@section('content')
<div class="container-fluid client-create">
    <div>
        <a href="{{url("client")}}" type="button" class="btn font-weight-bold btn-pattern">Listar</a>
    </div>
    <span class="title-page">Cadastro</span>
    
    @if(isset($errors) && count($errors) > 0)
        <div class="alert alert-danger mt-2" role="alert">
            @foreach($errors->all() as $erro)
                {{$erro}} <br>
            @endforeach
        </div>
    @endif

    <form method="post" action="{{url("client/store")}}">
        @method('POST')
        @csrf
        <div class="row">
            <div class="form-group col-md-12">
                <label class="font-weight-bold text-uppercase">Nome</label>
                <input autocomplete="off" type="text" name="name" class="form-control" required minlength="3">
            </div>
            <div class="form-group col-md-12">
                <label class="font-weight-bold text-uppercase">E-mail</label>
                <input autocomplete="off" type="email" name="email" class="form-control" required>
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