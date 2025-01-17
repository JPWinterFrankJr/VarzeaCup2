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
            <div class="logo"><a href="/">VarzeaCup</a></div>
            <nav>
                <ul>
                    @auth

                    <li>
                        <form action="/" method="get">
                            <button class="logout-button" type="submit">Início</button>
                        </form>
                    </li>
                    <li>
                        <form action="/create" method="get">
                            <button class="logout-button" type="submit">Cadastros</button>
                        </form>
                    </li>
                    <li>
                        <form action="/matche" method="get">
                            <button class="logout-button" type="submit">Partidas</button>
                        </form>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="logout-button">Sair</button>
                        </form>
                    </li>
                    @else
                    <h3>Deslogado</h3>
                    @endauth
                </ul>
            </nav>
        </div>
    </header>
    @yield('content')
</body>
</html>
