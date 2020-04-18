<!DOCTYPE html>
<html>
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{csrf_token()}}">

        <link rel="stylesheet" href="{{url('/bootstrap/bootstrap.css')}}">
        <link rel="stylesheet" href="{{url('/css/styles.global.css')}}">
        
        <!-- Auth -->
        <link rel="stylesheet" href="{{url('/css/auth/auth.index.css')}}">

        <title>{{$title}}</title>

    </head>
    <body>

        <div class="container mt-5 p-5 auth-index">

            <div class="title-page d-flex justify-content-center">
                <p>Login</p>
            </div>

            @if(isset($errors) && count($errors) > 0)
                <div class="alert alert-danger" role="alert">
                    @foreach($errors->all() as $erro)
                        {{$erro}} <br>
                    @endforeach
                </div>
            @endif

            <form id="frm_auth" method="post" action="{{url("auth/init")}}">
                @method('POST')
                @csrf
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="font-weight-bold text-uppercase">E-mail</label>
                        <input value="admin@gmail.com" autocomplete="off" type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="font-weight-bold text-uppercase">Senha</label>
                        <input value="123123" autocomplete="off" type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group col-md-12 d-flex justify-content-between">
                        <button type="submit" class="btn btn-success btn-block font-weight-bold">Entrar</button>
                    </div>
                </div>
            </form>
        </div>


        <script src="{{url('/jquery/jquery.js')}}"></script>
        <script src="{{url('/bootstrap/bootstrap.js')}}"></script>
        
    </body>
</html>
