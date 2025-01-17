@extends('navbar')

@push('css')
<link rel="stylesheet" href="/css/cadastros.css">
@endpush

@section('content')
<main>
    <div class="form-container">
        <h2>Cadastros</h2>
        <!-- Cadastro de Time -->

        <fieldset>
            <!-- Mensagem de Sucesso -->
            @if (session('success_team'))
            <p style="color: green;">{{ session('success_team') }}</p>
            @endif

            <!-- Mensagem de Erros -->
            @if (session('error_team'))
            <div style="color: red;" class="alert alert-danger">
                {{ session('error_team') }}
            </div>
            @endif
            <form action="{{ route('create_team')}}" method="post">
                @csrf
                <legend>Cadastro de Time</legend>
                <label for="team_name">Nome do Time</label>
                <input type="text" name="name" id="name" placeholder="Digite o nome do time" required>
                <button type="submit">Cadastrar</button>
            </form>
        </fieldset>


        <!-- Cadastro de Campeonato -->
        <fieldset>
            <!-- Mensagem de Sucesso -->
            @if (session('success_championshiep'))
            <p style="color: green;">{{ session('success_championshiep') }}</p>
            @endif

            <!-- Mensagem de Erros -->
            @if (session('error_championshiep'))
            <div style="color: red;" class="alert alert-danger">
                {{ session('error_championshiep') }}
            </div>
            @endif
            <form action="{{ route('create_championshiep') }}" method="post">
                @csrf
                <legend>Cadastro de Campeonato</legend>
                <label for="championship_name">Nome do Campeonato</label>
                <input type="text" name="name" id="championship_id" placeholder="Digite o nome do campeonato" required>

                <label for="championship_year">Ano</label>
                <input type="number" name="year" id="championship_id" placeholder="Digite o ano" min="2025" required>
                <button type="submit">Cadastrar</button>
            </form>
        </fieldset>

        <!-- Cadastro de Partida -->
        <fieldset>
            <!-- Mensagem de Sucesso -->
            @if (session('success_matche'))
            <p style="color: green;">{{ session('success_matche') }}</p>
            @endif

            <!-- Mensagem de Erros -->
            @if (session('error_matche'))
            <div style="color: red;" class="alert alert-danger">
                {{ session('error_matche') }}
            </div>
            @endif
            <form action="{{ route('create_matche') }}" method="post">
                @csrf
                <legend>Cadastro de Partida</legend>
            
                <label for="home_team_id">Time da Casa</label>
                <select name="home_team_id" id="home_team_id" required>
                    <option value="" disabled selected>Selecione o time</option>
                    @foreach ($teams as $team)
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>
            
                <label for="away_team_id">Time Visitante</label>
                <select name="away_team_id" id="away_team_id" required>
                    <option value="" disabled selected>Selecione o time</option>
                    @foreach ($teams as $team)
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>
            
                <label for="championships_id">Campeonato</label>
                <select name="championships_id" id="championships_id" required>
                    <option value="" disabled selected>Selecione o campeonato</option>
                    @foreach ($championships as $championship)
                        <option value="{{ $championship->id }}">{{ $championship->name }}</option>
                    @endforeach
                </select>
            
                <label for="round">Rodada</label>
                <input type="number" name="round" id="round" placeholder="Digite a rodada" min="1" max="2" required>
            
                <label for="scheduled_at">Data e Hora</label>
                <input type="datetime-local" name="scheduled_at" id="scheduled_at" required>
            
                <button type="submit">Cadastrar</button>
            </form>
            
        </fieldset>

    </div>
</main>
@endsection
