@extends('templates.template')

@section('content')
<div class="container-fluid admin-index">
    <form action="{{url("query/search")}}" method="get">
        <div class="row">
            <div class="form-group col-md-6 d-flex justify-content-start">
                <span class="title-page">CONSULTAS</span>
            </div>
            <div class="form-group col-md-6 d-flex justify-content-end">
                <a href="{{url("query/create")}}" class="btn btn-pattern">CADASTRAR NOVA CONSULTA</a>
            </div>
            <div class="form-group col-md-12 d-flex justify-content-start">
                <input placeholder="Pesquisar..." autocomplete="off" type="search" name="search" class="form-control col-md-4">
                <button class="btn btn-pattern">Pesquisar</button>
            </div>
        </div>
    </form>
    <div class="table-responsive">
        <table class="table table-sm border">
            <caption>Total de {{$querys->total()}} consulta(s). Listando {{$querys->perPage()}} consultas por página.</caption>
            <thead class="thead-dark">
                <tr class="text-uppercase">
                    <th>#</th>
                    <th>status</th>
                    <th>paciente</th>
                    <th>doutor</th>
                    <th class="text-right">ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($querys as $query)
                    <tr data-tr="{{$query->id}}" class="tr-query-index">
                        <th scope="row">{{$query->id}}</th>
                        <td>
                            @if($query->status == 'A')
                                <span class="badge badge-success">ATIVO</span>
                            @else
                                <span class="badge badge-danger">INATIVO</span>
                            @endif
                        </td>
                        <td class="text-uppercase">{{$query->patient_name}}</td>
                        <td class="text-uppercase">{{$query->doctor_name}}</td>
                        <td class="text-right actions">
                            <a href="{{url("query/$query->id")}}" class="btn btn-success btn-sm font-weight-bold text-uppercase">Editar</a>
                            <a href="{{url("query/destroy/$query->id")}}" class="btn btn-danger btn-sm font-weight-bold text-uppercase">Apagar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center font-weight-bold">
        {{$querys->links()}}
    </div>
</div>
@endsection