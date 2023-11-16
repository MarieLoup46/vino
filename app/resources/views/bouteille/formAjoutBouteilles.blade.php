@extends('layouts.app')
@section('title', 'Ajouter bouteilles')
@section('content')

<div class="scryping__container">
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
    @endif
    <div class="auth__header">
        <h1 class="auth__header-title">Ajouter bouteilles</h1>
    </div>
    <div class="auth__row">
        <div class="auth__col">
            <div class="auth__form-container">
                <form class="auth__form" method="POST" action="ajouter-bouteilles">
                    @csrf
                    <div class="auth__form-group">
                        <label for="nombre">Nombres des bouteilles dans la page:</label>
                        <select class="form-control" name="nombre" id="nombre">
                            <option value="24">24</option>
                            <option value="48">48</option>
                        </select>
                    </div>
                    <div class="auth__form-group">
                        <label for="page">Nombres des pages:</label>
                        <select class="form-control" name="page" id="page">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                    <button type="submit" class="auth__btn-login">Soumettre</button>

            </div>
        </div>
    </div>
</div>

@endsection
@include('layouts.footer')
