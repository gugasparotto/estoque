<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Home</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-1 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/products">Produtos</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="/dashboard">Dashboard</a>
                            </li> 
                            <li class="nav-item">
                                <form action="/logout" method="POST">
                                    @csrf 
                                    <a href="/logout" class="nav-link" onclick="event.preventDefalut(); this.closest('form').submit();">
                                        Sair
                                    </a>                                 
                                </form>
                            </li> 
                        @endauth
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="/login">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="/register">Criar conta</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <h1 class="row d-flex justify-content-center">{{$title}}</h1>
        {{$slot}}
    </div>
</body>
</html>
