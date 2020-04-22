<!DOCTYPE html>
<html>
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{csrf_token()}}">

        <link rel="stylesheet" href="{{url('/bootstrap/bootstrap.css')}}">
        <link rel="stylesheet" href="{{url('/css/styles.global.css')}}">
        
        <!-- User -->
        <link rel="stylesheet" href="{{url('/css/user/user.details.css')}}">
        <link rel="stylesheet" href="{{url('/css/user/user.index.css')}}">
        <link rel="stylesheet" href="{{url('/css/user/user.create.css')}}">

        <!-- Query -->
        <link rel="stylesheet" href="{{url('/css/query/query.details.css')}}">
        <link rel="stylesheet" href="{{url('/css/query/query.index.css')}}">
        <link rel="stylesheet" href="{{url('/css/query/query.create.css')}}">
        
        <!-- Patient -->
        <link rel="stylesheet" href="{{url('/css/patient/patient.details.css')}}">
        <link rel="stylesheet" href="{{url('/css/patient/patient.index.css')}}">
        <link rel="stylesheet" href="{{url('/css/patient/patient.create.css')}}">
        
        <!-- Doctor -->
        <link rel="stylesheet" href="{{url('/css/doctor/doctor.details.css')}}">
        <link rel="stylesheet" href="{{url('/css/doctor/doctor.index.css')}}">
        <link rel="stylesheet" href="{{url('/css/doctor/doctor.create.css')}}">
        
        <!-- Specialty -->
        <link rel="stylesheet" href="{{url('/css/specialty/specialty.details.css')}}">
        <link rel="stylesheet" href="{{url('/css/specialty/specialty.index.css')}}">
        <link rel="stylesheet" href="{{url('/css/specialty/specialty.create.css')}}">
        
        <title>{{$title}}</title>

    </head>
    <body>

        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">LARAVEL</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">CADASTRAR</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{url("user/create")}}">USUÁRIO</a>
                            <a class="dropdown-item" href="{{url("patient/create")}}">PACIENTE</a>
                            <a class="dropdown-item" href="{{url("doctor/create")}}">DOUTOR</a>
                            <a class="dropdown-item" href="{{url("specialty/create")}}">ESPECIALIDADE</a>
                            <a class="dropdown-item" href="{{url("query/create")}}">CONSULTA</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">LISTAR</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{url("user/index")}}">USUÁRIOS</a>
                            <a class="dropdown-item" href="{{url("patient/index")}}">PACIENTES</a>
                            <a class="dropdown-item" href="{{url("doctor/index")}}">DOUTORES</a>
                            <a class="dropdown-item" href="{{url("specialty/index")}}">ESPECIALIDADES</a>
                            <a class="dropdown-item" href="{{url("query/index")}}">CONSULTAS</a>
                        </div>
                    </li>
                </ul>
                <a class="btn btn-danger" href="{{url("logout")}}">SAIR</a>
            </div>
        </nav>

        <br>
        <br>
        <br>

        @yield('content')
        
        <script src="{{url('jquery/jquery.js')}}"></script>
        <script src="{{url('bootstrap/bootstrap.js')}}"></script>
        <script src="{{url('jquery.confirm/jquery.confirm.js')}}"></script>
        <script src="{{url('jquery.mask/dist/jquery.mask.js')}}"></script>
        <script src="{{url('js/ajax.set.up.js')}}"></script>
        <script src="{{url('js/user.js')}}"></script>
        <script src="{{url('js/query.js')}}"></script>
        <script src="{{url('js/patient.js')}}"></script>
        <script src="{{url('js/doctor.js')}}"></script>
        
    </body>
</html>
