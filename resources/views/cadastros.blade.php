@extends('navbar')

@push('css')
<link rel="stylesheet" href="/css/cadastros.css">
@endpush

@section('content')
<main>
    <div class="form-container">
        <h2>Cadastros</h2>
        <form  {{-- action= "{{ route('cadastro.store') }}" --}} method="POST">
            @csrf

            <!-- Cadastro de Time -->
            <fieldset>
                <legend>Cadastro de Time</legend>
                <label for="team_name">Nome do Time</label>
                <input type="text" name="team_name" id="team_name" placeholder="Digite o nome do time" required>
                <button type="submit">Cadastrar</button>
            </fieldset>

            <!-- Cadastro de Campeonato -->
            <fieldset>
                <legend>Cadastro de Campeonato</legend>
                <label for="championship_name">Nome do Campeonato</label>
                <input type="text" name="championship_name" id="championship_name" placeholder="Digite o nome do campeonato" required>

                <label for="championship_year">Ano</label>
                <input type="number" name="championship_year" id="championship_year" placeholder="Digite o ano" min="2025" required>
                <button type="submit">Cadastrar</button>
            </fieldset>

            <!-- Cadastro de Partida -->
            <fieldset>
                <legend>Cadastro de Partida</legend>
                <label for="home_team">Time da Casa</label>
                <select name="home_team" id="home_team" required>
                    <option value="" disabled selected>Selecione o time</option>
                   {{--  @foreach ($times as $time)
                        <option value="{{ $time->id }}">{{ $time->name }}</option>
                    @endforeach--}}
                    
                </select>

                <label for="away_team">Time Visitante</label>
                <select name="away_team" id="away_team" required>
                    <option value="" disabled selected>Selecione o time</option>
                   {{-- @foreach ($times as $time)
                        <option value="{{ $time->id }}">{{ $time->name }}</option>
                    @endforeach--}}
                </select>

                <label for="championship">Campeonato</label>
                <select name="championship" id="championship" required>
                    <option value="" disabled selected>Selecione o campeonato</option>
                   {{-- @foreach ($campeonatos as $campeonato)
                        <option value="{{ $campeonato->id }}">{{ $campeonato->name }}</option>
                    @endforeach --}}
                </select>

                <label for="round">Rodada</label>
                <input type="number" name="round" id="round" placeholder="Digite a rodada" min="1" max="2" required>

                <label for="scheduled_at">Data e Hora</label>
                <input type="datetime-local" name="scheduled_at" id="scheduled_at" required>
                <button type="submit">Cadastrar</button>
            </fieldset>
        </form>
    </div>
</main>
@endsection

