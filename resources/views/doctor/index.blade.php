@extends('templates.template')

@section('content')
<div class="container-fluid admin-index">
    <form action="{{url("doctor/search")}}" method="get">
        <div class="row">
            <div class="form-group col-md-6 d-flex justify-content-start">
                <span class="title-page">PRODUTOS</span>
            </div>
            <div class="form-group col-md-6 d-flex justify-content-end">
                <a href="{{url("doctor/create")}}" class="btn btn-pattern">CADASTRAR NOVO PRODUTO</a>
            </div>
            <div class="form-group col-md-12 d-flex justify-content-start">
                <input placeholder="Pesquisar..." autocomplete="off" type="search" name="search" class="form-control col-md-4">
                <button class="btn btn-pattern">Pesquisar</button>
            </div>
        </div>
    </form>
    <div class="table-responsive">
        <table class="table table-sm border">
            <caption>Total de {{$doctors->total()}} doctor(s). Listando {{$doctors->perPage()}} doctors por página.</caption>
            <thead class="thead-dark">
                <tr class="text-uppercase">
                    <th>#</th>
                    <th>nome</th>
                    <th>e-mail</th>
                    <th class="text-right">ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($doctors as $doctor)
                    <tr data-tr="{{$doctor->id}}" class="tr-doctor-index">
                        <th scope="row">{{$doctor->id}}</th>
                        <td class="text-uppercase">{{$doctor->name}}</td>
                        <td>{{$doctor->email}}</td>
                        <td class="text-right actions">
                            <a href="{{url("doctor/$doctor->id")}}" class="btn btn-success btn-sm font-weight-bold text-uppercase">Editar</a>
                            <a href="{{url("doctor/destroy/$doctor->id")}}" class="btn btn-danger btn-sm font-weight-bold text-uppercase">Apagar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center font-weight-bold">
        {{$doctors->links()}}
    </div>
</div>
@endsection