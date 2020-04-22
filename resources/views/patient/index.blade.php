@extends('templates.template')

@section('content')
<div class="container-fluid patient-index">
    <form action="{{url("patient/search")}}" method="get">
        <div class="row">
            <div class="form-group col-md-6 d-flex justify-content-start">
                <span class="title-page">Pacientes</span>
            </div>
            <div class="form-group col-md-6 d-flex justify-content-end">
                <a href="{{url("patient/create")}}" class="btn btn-pattern">CADASTRAR NOVO PACIENTE</a>
            </div>
            <div class="form-group col-md-12 d-flex justify-content-start">
                <input placeholder="Pesquisar..." autocomplete="off" type="search" name="search" class="form-control col-md-4">
                <button class="btn btn-pattern">Pesquisar</button>
            </div>
        </div>
    </form>
    <div class="table-responsive">
        <table class="table table-sm border">
            <caption>Total de {{$patients->total()}} paciente(s). Listando {{$patients->perPage()}} pacientes por página.</caption>
            <thead class="thead-dark">
                <tr class="text-uppercase">
                    <th>#</th>
                    <th>nome</th>
                    <th>e-mail</th>
                    <th class="text-right">ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($patients as $patient)
                    <tr data-tr="{{$patient->id}}" class="tr-patient-index">
                        <th scope="row">{{$patient->id}}</th>
                        <td class="text-uppercase">{{$patient->name}}</td>
                        <td class="text-dark">
                            <a href="#patient{{$patient->id}}">{{$patient->email}}</a>    
                        </td>
                        <td class="text-right actions">
                            <button type="button" class="btn btn-pattern btn-sm font-weight-bold text-uppercase" data-id="{{$patient->id}}" data-toggle="modal" data-target="#patientDetails{{$patient->id}}">Detalhes</button>
                            <a href="{{url("patient/$patient->id")}}" class="btn btn-success btn-sm font-weight-bold text-uppercase">Editar</a>
                            <a href="{{url("patient/destroy/$patient->id")}}" class="btn btn-danger btn-sm font-weight-bold text-uppercase">Apagar</a>
                        </td>
                    </tr>

                    <div class="modal fade modal-patient-index" id="patientDetails{{$patient->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Detalhes do patiente</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <ul class="list-unstyled">
                                        <li class="media">
                                            <img style="width: 120px; heigth: 120px" src="{{url('/images/image_info.png')}}" class="mr-3" alt="Imagem">
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1 text-uppercase">{{$patient->name}}</h5>
                                                <ul>
                                                    <li>E-mail: {{$patient->email}}</li>
                                                    <li>Última alteração:  {{$patient->updated_at}}</li>
                                                    <li>Data de cadastro:  {{$patient->created_at}}</li>
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
        {{$patients->links()}}
    </div>
</div>
@endsection