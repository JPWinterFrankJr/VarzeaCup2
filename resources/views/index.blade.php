@extends('navbar')

@push('css')
<link rel="stylesheet" href="/css/index.css">
@endpush
@section('content')
<main>

    <div class="side-panel">
        <section class="login">
            <h2>Login</h2>
            <form action="{{ route('logar')}}" method="post">
                @csrf

                <input type="email" placeholder="E-mail" name="email" id="email" required>
                <input type="password" placeholder="Senha" name="password" id="password" required>
                <button type="submit" id="entrar" value="Entrar">Entrar</button>
            </form>
            <form action="{{ route('view_user')}}" method="get">
                <button type="submit" class="secondary-button">Cadastrar</button>
                @if ($errors->has('email'))
                <div class="alert alert-danger">
                    {{ $errors->first('email') }}
                </div>
                @endif

            </form>
        </section>

        <section class="about">
            <h2>Sobre o VarzeaCup</h2>
            <p>O VarzeaCup é uma plataforma dedicada aos campeonatos de futebol de várzea, promovendo a interação entre times, jogadores e torcedores. Aqui você pode acompanhar a classificação, resultados e todas as novidades do campeonato.</p>
        </section>
    </div>
    <section class="classification">
        <h2>Classificação</h2>
        <table>
            <thead>
                <tr>
                    <th>Posição</th>
                    <th>Equipe</th>
                    <th>Pontos</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Time A</td>
                    <td>25</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Time B</td>
                    <td>22</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Time C</td>
                    <td>20</td>
                </tr>
            </tbody>
        </table>
    </section>

</main>
@endsection
