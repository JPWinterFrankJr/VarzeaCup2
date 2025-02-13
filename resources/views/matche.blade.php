@extends('navbar')

@push('css')
<link rel="stylesheet" href="/css/cadastros.css">
<link rel="stylesheet" href="/css/partidas.css">

@endpush

@section('content')

<main>
    <div class="form-container">
        <h2>Partidas e Edições</h2>

        <!-- Seleção de Campeonato -->
        <fieldset>
            <form action="{{ route('matche_filter') }}" method="get">
                @csrf
                <select name="selected_championship" id="selected_championship" required>
                    <option value="" disabled selected>Selecione o campeonato</option>
                    @foreach ($championships as $campeonato)
                    <option value="{{ $campeonato->id }}">{{ $campeonato->name }}</option>
                    @endforeach
                </select>
                <button type="submit">Filtrar</button>
            </form>
        </fieldset>

        <div class="content-wrapper">
            <!-- Tabela de Partidas -->
            <section class="matches-section">
                <h3>Editar Partidas</h3>
                @if (session('matche'))
                <p style="color: green;">{{ session('matche') }}</p>
                @endif
                <p style="color: rgb(255, 8, 8);">{{ session('destroy_matche') }}</p>
                
                <table>
                    <thead>
                        <tr>
                            <th>Campeonato / Year</th>
                            <th>Rodada</th>
                            <th>Time da Casa</th>
                            <th>Gols</th>
                            <th>Time Visitante</th>
                            <th>Gols</th>
                            <th>Data e Hora</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody id="matches_table">
                        @if($matches->count())
                        @foreach($matches as $partida)
                        <tr>
                            <form action="{{ route('updatematche', ['id' => $partida->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <td>{{ $partida->championship->name }} {{ $partida->championship->year }}</td>
                                <td>{{ $partida->round }}</td>
                                <td>{{ $partida->homeTeam->name }}</td>
                                <td><input type="number" name="home_team_score" value="{{ $partida->home_team_score }}" min="0"></td>
                                <td>{{ $partida->awayTeam->name }}</td>
                                <td><input type="number" name="away_team_score" value="{{ $partida->away_team_score }}" min="0"></td>
                                <td>{{ $partida->scheduled_at }}</td>
                                <td>
                                    <button type="submit">Salvar</button>
                            </form>
                            <form action="{{ route('destroymatche', ['id' => $partida->id]) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button style="color: red" type="submit">Deletar</button>
                            </form>
                            </td>

                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="8">Nenhuma partida encontrada.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </section>

            <!-- Tabelas lado a lado para Times e Campeonatos -->
            <section class="times-camp-section">
                <div class="times-table">
                    <h3>Campeonatos</h3>
                    @if (session('champioship'))
                    <p style="color: green;">{{ session('champioship') }}</p>
                    @endif
                    <p style="color: rgb(255, 8, 8);">{{ session('destroychampionship') }}</p>
                    <table>
                        <thead>
                            <tr>
                                <th>Campeonato</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($championships as $championship)
                            <tr>
                                <form action="{{ route('updatechampionship', ['id' => $championship->id])}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <td>
                                        <input type="text" name="name" value="{{ $championship->name }}" required>
                                    </td>
                                    <td>
                                        <button type="submit">Salvar</button>
                                    </form>
                                    <form action="{{ route('destroychampionship',['id' => $championship->id])}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button style="color: red" type="submit">Deletar</button>
                                    </td>
                                    </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="teams-table">
                    <h3>Times</h3>
                    @if (session('team'))
                    <p style="color: green;">{{ session('team') }}</p>
                    @endif
                    <p style="color: rgb(255, 8, 8);">{{ session('destroyteam') }}</p>
                    <table>
                        <thead>
                            <tr>
                                <th>Time</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teams as $team)
                            <tr>
                                <form action="{{ route('updateteam', ['id' => $team->id])}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <td>
                                        <input type="text" name="name" value="{{ $team->name }}" required>
                                    </td>
                                    <td>
                                    </form>
                                        <button type="submit">Salvar</button>
                                        <form action="{{ route('destroyteam', ['id' => $team->id])}}" method="POST">
                                            @csrf
                                            @method('delete')
                                        <button style="color: red" type="submit">Deletar</button>
                                    </td>
                                </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="users-table">
                    <h3>Usuários</h3>
                    @if (session('destroyuser'))
                    <p style="color: green;">{{ session('user') }}</p>
                    @endif
                    <p style="color: rgb(255, 8, 8);">{{ session('destroyuser') }}</p>
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <form action="{{ route('updateuser', ['id' => $user->id])}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <td>
                                        <input type="text" name="name" value="{{ $user->name }}" required>
                                    </td>
                                    <td>
                                        <input type="email" name="email" value="{{ $user->email }}" required>
                                    </td>
                                    <td>
                                        <button type="submit">Salvar</button>
                                    </form>
                                        <form action="{{ route('destroyuser', ['id' => $user->id])}}" method="POST">
                                            @csrf
                                            @method('delete')
                                        <button style="color: red" type="submit">Deletar</button>
                                    </td>
                                </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>

        </div>
    </div>
</main>
@endsection
