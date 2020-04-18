@extends('templates.template')

@section('content')
<div class="container-fluid admin-index">
    <form action="{{url("product/search")}}" method="get">
        <div class="row">
            <div class="form-group col-md-6 d-flex justify-content-start">
                <span class="title-page">PRODUTOS</span>
            </div>
            <div class="form-group col-md-6 d-flex justify-content-end">
                <a href="{{url("product/create")}}" class="btn btn-pattern">CADASTRAR NOVO PRODUTO</a>
            </div>
            <div class="form-group col-md-12 d-flex justify-content-start">
                <input placeholder="Pesquisar..." autocomplete="off" type="search" name="search" class="form-control col-md-4">
                <button class="btn btn-pattern">Pesquisar</button>
            </div>
        </div>
    </form>
    <div class="table-responsive">
        <table class="table table-sm border">
            <caption>Total de {{$products->total()}} product(s). Listando {{$products->perPage()}} products por página.</caption>
            <thead class="thead-dark">
                <tr class="text-uppercase">
                    <th>#</th>
                    <th>status</th>
                    <th>nome</th>
                    <th>valor</th>
                    <th class="text-center">ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr data-tr="{{$product->id}}" class="tr-product-index">
                        <th scope="row">{{$product->id}}</th>
                        <td>
                            @if($product->status == 'A')
                                <span class="badge badge-success">ATIVO</span>
                            @else
                                <span class="badge badge-danger">INATIVO</span>
                            @endif
                        </td>
                        <td class="text-uppercase">{{$product->name}}</td>
                        <td>{{number_format($product->value, 2, ',', '.')}}</td>
                        <td class="text-center actions">
                            <a href="{{url("product/$product->id")}}" class="btn btn-success btn-sm font-weight-bold text-uppercase">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center font-weight-bold">
        {{$products->links()}}
    </div>
</div>
@endsection