@extends('layouts.app')
@section('content')
    <div class="row">
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

                <div class="text-center text-italic mb-4">
                    <h3>Mes celliers</h3>
                </div>

            <form action="{{ route('cellier.update', $cellier->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group mb-3">
                    <label for="nomDuCellier" class="mb-0">Nom du cellier:</label>
                    <input placeholder="EX: MAISON" type="text" class="form-control mt-1" id="nom" name="nom" value="{{ old('nom', $cellier->nom) }}">
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn-submit">Modifier cellier</button>
                </div>
            </form>

                <hr class="mt-3 mb-3">

            <form action="{{ route('cellier.destroy', $cellier->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn-submit">Supprimer cellier</button>
            </form>
        </div>
    </div>
@endsection
