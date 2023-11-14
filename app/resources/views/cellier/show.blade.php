@extends('layouts.app')
@section('title', 'Gerer cellier')
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

                <div class="modifier text-center ">
                    <h3>Mes Celliers</h3>
                </div>

            <form action="{{ route('cellier.update', $cellier->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group mb-3">
                    <label for="nomDuCellier" class="mb-0">NOM DU CELLIER:</label>
                    <input placeholder="EX: MAISON" type="text" class="form-control mt-1" id="nom" name="nom" value="{{ old('nom', $cellier->nom) }}">
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn-submit">MODIFIER CELLIER</button>
                </div>
            </form>



            <form action="{{ route('cellier.destroy', $cellier->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn-submit">SUPPRIMER CELLIER</button>
            </form>
        </div>
    </div>
@endsection
@include('layouts.footer')
