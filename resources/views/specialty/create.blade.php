@extends('templates.template')

@section('content')
<div class="container-fluid sale-create">
    <div>
        <a href="{{url("sale")}}" type="button" class="btn font-weight-bold btn-pattern">Listar</a>
    </div>
    <span class="title-page">Cadastro</span>
    
    @if(isset($errors) && count($errors) > 0)
        <div class="alert alert-danger mt-2" role="alert">
            @foreach($errors->all() as $erro)
                {{$erro}} <br>
            @endforeach
        </div>
    @endif

    <form method="post" action="{{url("sale/store")}}">
        @method('POST')
        @csrf
        <div class="row">
            <div class="form-group col-md-12">
                <label class="font-weight-bold text-uppercase">Cliente</label>
                <select name="client_id" class="form-control" required>
                    <option value="">SELECIONE...</option>
                    @foreach($clients as $client)
                        <option class="text-uppercase" value="{{$client->id}}">{{$client->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-12">
                <label class="font-weight-bold text-uppercase">Produto</label>
                <select name="product_id" class="form-control" required>
                    <option value="">SELECIONE...</option>
                    @foreach($products as $product)
                        <option class="text-uppercase" value="{{$product->id}}">{{$product->name}} - R$ {{number_format($product->value, 2, ',', '.')}}</option>
                    @endforeach
                </select>
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