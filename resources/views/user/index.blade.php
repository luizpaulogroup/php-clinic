@extends('templates.template')

@section('content')
<div class="container-fluid user-index">
    <form action="{{url("user/search")}}" method="get">
        <div class="row">
            <div class="form-group col-md-6 d-flex justify-content-start">
                <span class="title-page">Usuários</span>
            </div>
            <div class="form-group col-md-6 d-flex justify-content-end">
                <a href="{{url("user/create")}}" class="btn btn-pattern">CADASTRAR NOVO USUÁRIO</a>
            </div>
            <div class="form-group col-md-12 d-flex justify-content-start">
                <input placeholder="Pesquisar..." autocomplete="off" type="search" name="search" class="form-control col-md-4">
                <button class="btn btn-pattern">Pesquisar</button>
            </div>
        </div>
    </form>
    <div class="table-responsive">
        <table class="table table-sm border">
            <caption>Total de {{$users->total()}} usuário(s). Listando {{$users->perPage()}} usuários por página.</caption>
            <thead class="thead-dark">
                <tr class="text-uppercase">
                    <th>#</th>
                    <th>nome</th>
                    <th>e-mail</th>
                    <th class="text-right">ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr data-tr="{{$user->id}}" class="tr-user-index">
                        <th scope="row">{{$user->id}}</th>
                        <td class="text-uppercase">{{$user->name}}</td>
                        <td class="text-dark">
                            <a href="#user{{$user->id}}">{{$user->email}}</a>    
                        </td>
                        <td class="text-right actions">
                            <button type="button" class="btn btn-pattern btn-sm font-weight-bold text-uppercase" data-id="{{$user->id}}" data-toggle="modal" data-target="#userDetails{{$user->id}}">Detalhes</button>
                            <a href="{{url("user/$user->id")}}" class="btn btn-success btn-sm font-weight-bold text-uppercase">Editar</a>
                            <a href="{{url("user/destroy/$user->id")}}" class="btn btn-danger btn-sm font-weight-bold text-uppercase">Apagar</a>
                        </td>
                    </tr>

                    <div class="modal fade modal-user-index" id="userDetails{{$user->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Detalhes do usuário</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <ul class="list-unstyled">
                                        <li class="media">
                                            <img style="width: 120px; heigth: 120px" src="{{url('/images/image_info.png')}}" class="mr-3" alt="Imagem">
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1 text-uppercase">{{$user->name}}</h5>
                                                <ul>
                                                    <li>E-mail: {{$user->email}}</li>
                                                    <li>Última alteração:  {{$user->updated_at}}</li>
                                                    <li>Data de cadastro:  {{$user->created_at}}</li>
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
        {{$users->links()}}
    </div>
</div>
@endsection