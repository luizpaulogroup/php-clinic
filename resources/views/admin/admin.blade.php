@extends('templates.template')

@section('content')
<div class="container-fluid admin-admin">
    <div>
        <a href="{{url("admin")}}" type="button" class="btn font-weight-bold btn-pattern">Voltar</a>
    </div>
    <span class="title-page">Editar</span>

    @if(isset($errors) && count($errors) > 0)
        <div class="alert alert-danger mt-2" role="alert">
            @foreach($errors->all() as $erro)
                {{$erro}} <br>
            @endforeach
        </div>
    @endif

    <form method="post" action="{{url("admin/update/$admin->id")}}">
        @method('PATCH')
        @csrf
        <div class="row">
            <div class="form-group col-md-12">
                <label class="font-weight-bold text-uppercase">Nome</label>
                <input type="hidden" name="id" class="form-control" value="{{$admin->id}}">
                <input autocomplete="off" type="text" name="name" class="form-control" value="{{$admin->name}}" required minlength="3">
            </div>
            <div class="form-group col-md-6">
                <label class="font-weight-bold text-uppercase">E-mail</label>
                <input autocomplete="off" type="text" name="email" class="form-control" value="{{$admin->email}}" required>
            </div>
            <div class="form-group col-md-6">
                <label class="font-weight-bold text-uppercase">Senha</label>
                <input autocomplete="off" type="text" name="password" class="form-control" value="{{$admin->password}}" required>
            </div>
            <div class="form-group col-md-12">
                <label class="font-weight-bold text-uppercase">Status</label>
                <select name="status" class="form-control" required>
                    @if($admin->status == 'A')
                        <option value="A">ATIVO</option>
                        <option value="I">INATIVO</option>
                    @else
                        <option value="I">INATIVO</option>
                        <option value="A">ATIVO</option>
                    @endif
                </select>
            </div>
            <div class="form-group col-md-6">
                <label class="font-weight-bold text-uppercase">Última alteração</label>
                <input disabled type="text" name="created_at" class="form-control" value="{{$admin->created_at}}">
            </div>
            <div class="form-group col-md-6">
                <label class="font-weight-bold text-uppercase">Data de cadastro</label>
                <input disabled type="text" name="updated_at" class="form-control" value="{{$admin->updated_at}}">
            </div>
            <div class="form-group col-md-12">
                <button type="submit" class="btn btn-block btn-success font-weight-bold">Salvar</button>
            </div>
        </div>
    </form>
</div>
@endsection