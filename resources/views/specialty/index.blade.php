@extends('templates.template')

@section('content')
<div class="container-fluid specialty-index">
    <form action="{{url("specialty/search")}}" method="get">
        <div class="row">
            <div class="form-group col-md-6 d-flex justify-content-start">
                <span class="title-page">Especialidades</span>
            </div>
            <div class="form-group col-md-6 d-flex justify-content-end">
                <a href="{{url("specialty/create")}}" class="btn btn-pattern">CADASTRAR NOVA VENDA</a>
            </div>
            <div class="form-group col-md-12 d-flex justify-content-start">
                <input placeholder="Pesquisar..." autocomplete="off" type="search" name="search" class="form-control col-md-4">
                <button class="btn btn-pattern">Pesquisar</button>
            </div>
        </div>
    </form>
    <div class="table-responsive">
        <table class="table table-sm border">
            <caption>Total de {{$specialtys->total()}} venda(s). Listando {{$specialtys->perPage()}} vendas por página.</caption>
            <thead class="thead-dark">
                <tr class="text-uppercase">
                    <th>#</th>
                    <th>nome</th>
                    <th class="text-right">ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($specialtys as $specialty)
                    <tr data-tr="{{$specialty->id}}" class="tr-specialty-index">
                        <th scope="row">{{$specialty->id}}</th>
                        <td class="text-uppercase">{{$specialty->name}}</td>
                        <td class="text-right actions">
                            <a href="{{url("specialty/$specialty->id")}}" class="btn btn-success btn-sm font-weight-bold text-uppercase">Editar</a>
                            <a href="{{url("specialty/destroy/$specialty->id")}}" class="btn btn-danger btn-sm font-weight-bold text-uppercase">Apagar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center font-weight-bold">
        {{$specialtys->links()}}
    </div>
</div>
@endsection