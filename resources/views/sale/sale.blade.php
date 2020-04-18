@extends('templates.template')

@section('content')
<div class="container-fluid sale-sale">
    <div>
        <a href="{{url("sale")}}" type="button" class="btn font-weight-bold btn-pattern">Voltar</a>
    </div>
    <span class="title-page">Editar</span>

    @if(isset($errors) && count($errors) > 0)
        <div class="alert alert-danger mt-2" role="alert">
            @foreach($errors->all() as $erro)
                {{$erro}} <br>
            @endforeach
        </div>
    @endif

    <form method="post" action="{{url("sale/update/$sale->id")}}">
        @method('PATCH')
        @csrf
        <div class="row">
            <div class="form-group col-md-6">
                <label class="font-weight-bold text-uppercase">Cliente</label>
                <input disabled type="text" class="form-control text-uppercase" value="{{$sale->client_name}}">
            </div>
            <div class="form-group col-md-6">
                <label class="font-weight-bold text-uppercase">Produto</label>
                <input disabled type="text" class="form-control text-uppercase" value="{{$sale->product_name}}">
            </div>
            <div class="form-group col-md-12">
                <label class="font-weight-bold text-uppercase">Valor</label>
                <input disabled type="text" class="form-control money" value="R$ {{$sale->value}}">
            </div>
            <div class="form-group col-md-12">
                <label class="font-weight-bold text-uppercase">Status</label>
                <select name="status" class="form-control" required>
                    @if($sale->status == 'A')
                        <option value="A">ATIVO</option>
                        <option value="I">INATIVO</option>
                    @else
                        <option value="I">INATIVO</option>
                        <option value="A">ATIVO</option>
                    @endif
                </select>
            </div>
            <div class="form-group col-md-12">
                <button type="submit" class="btn btn-block btn-success font-weight-bold">Salvar</button>
            </div>
        </div>
    </form>

</div>
@endsection