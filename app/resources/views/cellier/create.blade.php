@extends('layouts.app')

@section('title', 'Ajouter cellier')

@section('content')
    <main class="create-cellier-container">
        @if ($errors->any())
            <article class="create-cellier-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </article>
        @endif

        @if (session('success'))
            <article class="create-cellier-success">
                {{ session('success') }}
            </article>
        @endif

        <header class="create-cellier-titre">
            <h1>Ajouter un Cellier</h1>
        </header>

        <form action="{{ route('cellier.store') }}" method="POST">
            @csrf
            <div class="create-cellier-form">
                <label for="nomDuCellier" class="create-cellier-nom">NOM DU CELLIER:</label>
                <input placeholder="EX: MAISON" type="text" class="create-cellier-input" id="nom" name="nom" required>
            </div>
            <button type="submit" class="create-cellier-btn">CRÉER UN CELLIER</button>
        </form>
    </main>
    @include('layouts.footer')
@endsection
