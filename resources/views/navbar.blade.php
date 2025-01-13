<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VarzeaCup</title>
    <link rel="stylesheet" href="/css/navbar.css">
    @stack('css')
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">VarzeaCup</div>
            <nav>
                <ul>
                    @auth
                        <li><a href="/times/create">Cadastrar Times</a></li>
                        <li><a href="/partidas/create">Cadastrar Partidas</a></li>
                        <li>
                            <form action="/logout" method="POST" class="logout-form">
                                @csrf
                                <button type="submit">Sair</button>
                            </form>
                        </li>
                    @else
                    @endauth
                </ul>
            </nav>
        </div>
    </header>
    @yield('content')
</body>
</html>