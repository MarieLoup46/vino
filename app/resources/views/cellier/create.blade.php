@extends('layouts.app')
@section('title', 'Ajouter cellier')
@section('content')
    <div class="create-container">
        <div class="mx-5 mt-5">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

                <div class="create-title">
                    <h3>Ajouter un Cellier</h3>
                </div>

            <form action="{{ route('cellier.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nomDuCellier" class="mb-0">NOM DU CELLIER:</label>
                    <input placeholder="EX: MAISON" type="text" class="form-control mt-1" id="nom" name="nom" required>
                </div>
                <button type="submit" class="btn-submit">CRÉER UN CELLIER</button>
            </form>
        </div>
    </div>
@endsection
@include('layouts.footer')
