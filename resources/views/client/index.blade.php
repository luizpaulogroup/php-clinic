@extends('templates.template')

@section('content')
<div class="container-fluid client-index">
    <form action="{{url("client/search")}}" method="get">
        <div class="row">
            <div class="form-group col-md-6 d-flex justify-content-start">
                <span class="title-page">Clientes</span>
            </div>
            <div class="form-group col-md-6 d-flex justify-content-end">
                <a href="{{url("client/create")}}" class="btn btn-pattern">CADASTRAR NOVO CLIENTE</a>
            </div>
            <div class="form-group col-md-12 d-flex justify-content-start">
                <input placeholder="Pesquisar..." autocomplete="off" type="search" name="search" class="form-control col-md-4">
                <button class="btn btn-pattern">Pesquisar</button>
            </div>
        </div>
    </form>
    <div class="table-responsive">
        <table class="table table-sm border">
            <caption>Total de {{$clients->total()}} cliente(s). Listando {{$clients->perPage()}} clientes por página.</caption>
            <thead class="thead-dark">
                <tr class="text-uppercase">
                    <th>#</th>
                    <th>status</th>
                    <th>nome</th>
                    <th>e-mail</th>
                    <th class="text-center">ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                    <tr data-tr="{{$client->id}}" class="tr-client-index">
                        <th scope="row">{{$client->id}}</th>
                        <td>
                            @if($client->status == 'A')
                                <span class="badge badge-success">ATIVO</span>
                            @else
                                <span class="badge badge-danger">INATIVO</span>
                            @endif
                        </td>
                        <td class="text-uppercase">{{$client->name}}</td>
                        <td class="text-dark">
                            <a href="#client{{$client->id}}">{{$client->email}}</a>    
                        </td>
                        <td class="text-center actions">
                            <button type="button" class="btn btn-pattern btn-sm font-weight-bold text-uppercase" data-id="{{$client->id}}" data-toggle="modal" data-target="#clientDetails{{$client->id}}">Detalhes</button>
                            <a href="{{url("client/$client->id")}}" class="btn btn-success btn-sm font-weight-bold text-uppercase">Editar</a>
                        </td>
                    </tr>

                    <div class="modal fade modal-client-index" id="clientDetails{{$client->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Detalhes do cliente</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <ul class="list-unstyled">
                                        <li class="media">
                                            <img style="width: 120px; heigth: 120px" src="{{url('/images/image_info.png')}}" class="mr-3" alt="Imagem">
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1 text-uppercase">{{$client->name}}</h5>
                                                <ul>
                                                    <li>E-mail: {{$client->email}}</li>
                                                    <li>Status:  @if($client->status == 'A') <span class="badge badge-success">ATIVO</span> @else <span class="badge badge-danger">INATIVO</span> @endif</li>
                                                    <li>Última alteração:  {{$client->updated_at}}</li>
                                                    <li>Data de cadastro:  {{$client->created_at}}</li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center font-weight-bold">
        {{$clients->links()}}
    </div>
</div>
@endsection