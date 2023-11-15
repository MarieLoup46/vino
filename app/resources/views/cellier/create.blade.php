@extends('layouts.app')
@section('title', 'Ajouter cellier')
@section('content')
    <div class="cellier-container">
        <div class="cellier-content">
            @if ($errors->any())
                <div class="cellier-alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="cellier-alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="cellier-title">
                <h3>Ajouter un Cellier</h3>
            </div>

            <form action="{{ route('cellier.store') }}" method="POST">
                @csrf
                <div class="cellier-form-group">
                    <label for="nomDuCellier" class="cellier-label">NOM DU CELLIER:</label>
                    <input placeholder="EX: MAISON" type="text" class="cellier-input" id="nom" name="nom" required>
                </div>
                <button type="submit" class="cellier-btn-submit">CRÉER UN CELLIER</button>
            </form>
        </div>
    </div>
@endsection
@include('layouts.footer')
