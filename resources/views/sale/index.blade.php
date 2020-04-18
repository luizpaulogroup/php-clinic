@extends('templates.template')

@section('content')
<div class="container-fluid sale-index">
    <form action="{{url("sale/search")}}" method="get">
        <div class="row">
            <div class="form-group col-md-6 d-flex justify-content-start">
                <span class="title-page">Vendas</span>
            </div>
            <div class="form-group col-md-6 d-flex justify-content-end">
                <a href="{{url("sale/create")}}" class="btn btn-pattern">CADASTRAR NOVA VENDA</a>
            </div>
            <div class="form-group col-md-12 d-flex justify-content-start">
                <input placeholder="Pesquisar..." autocomplete="off" type="search" name="search" class="form-control col-md-4">
                <button class="btn btn-pattern">Pesquisar</button>
            </div>
        </div>
    </form>
    <div class="table-responsive">
        <table class="table table-sm border">
            <caption>Total de {{$sales->total()}} venda(s). Listando {{$sales->perPage()}} vendas por página.</caption>
            <thead class="thead-dark">
                <tr class="text-uppercase">
                    <th>#</th>
                    <th>status</th>
                    <th>cliente</th>
                    <th>produto</th>
                    <th>valor</th>
                    <th class="text-center">ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sales as $sale)
                    <tr data-tr="{{$sale->id}}" class="tr-sale-index">
                        <th scope="row">{{$sale->id}}</th>
                        <td>
                            @if($sale->status == 'A')
                                <span class="badge badge-success">ATIVO</span>
                            @else
                                <span class="badge badge-danger">INATIVO</span>
                            @endif
                        </td>
                        <td class="text-uppercase">{{$sale->client_name}}</td>
                        <td class="text-uppercase">{{$sale->product_name}}</td>
                        <td class="text-uppercase">R$ {{number_format($sale->value, 2, ',', '.')}}</td>
                        <td class="text-center actions">
                            <a href="{{url("sale/$sale->id")}}" class="btn btn-success btn-sm font-weight-bold text-uppercase">Editar</a>
                            <button type="button" class="btn btn-danger btn-sm font-weight-bold text-uppercase delete-sale" data-id="{{$sale->id}}">Apagar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center font-weight-bold">
        {{$sales->links()}}
    </div>
</div>
@endsection