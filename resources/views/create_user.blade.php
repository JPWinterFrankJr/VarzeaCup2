@extends('navbar')

@push('css')
<link rel="stylesheet" href="/css/cadastros.css">
@endpush

@section('content')

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif



<main>
    <div class="form-container">
        <h2>Cadastrar seu Usuário</h2>
        <form action="{{ route('create_user') }}" method="post">
            @csrf

            <!-- Cadastro de usuário -->
            <fieldset>
                <legend>Cadastro do usuário</legend>
                <label for="name">Nome do usuário</label> 
                <input type="text" name="name" id="name" placeholder="Digite o nome do usuário" required> 

                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" placeholder="Digite o seu e-mail" required>

                <label for="password">Cadastre sua senha</label>
                <input type="password" name="password" id="password" placeholder="Digite sua senha" required>

                <button type="submit">Cadastrar</button>
            </fieldset>
        </form>
    </div>
</main>
@endsection
