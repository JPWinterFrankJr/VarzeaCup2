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
        @if ($championshipId)
        <h2>Classificação do Campeonato: {{ $championship->name }}</h2>
    @else
        <h2>Classificação Geral</h2>
    @endif    <table>
        <thead>
            <tr>
                <th>Posição</th>
                <th>Time</th>
                <th>Pontos</th>
                <th>Partidas Jogadas</th>
                <th>Vitórias</th>
                <th>Empates</th>
                <th>Derrotas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classification as $index => $team)
                <tr>
                    <td>  {{$posicao++}}  </td>
                    <td>{{ $team->team_name }}</td>
                    <td>{{ $team->points }}</td>
                    <td>{{ $team->games_played }}</td>
                    <td>{{ $team->wins }}</td>
                    <td>{{ $team->draws }}</td>
                    <td>{{ $team->losses }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <form action="{{ route('index') }}" method="get">
        @csrf
        <select name="championshipId" onchange="this.form.submit()">
            <option value="" selected>Selecionar Campeonato</option>
            @foreach ($championships as $champ)
                <option value="{{ $champ->id }}" @if($champ->id == $championshipId) selected @endif>{{ $champ->name }}</option>
            @endforeach
        </select>
    </form>
    
    </section>

</main>
@endsection
