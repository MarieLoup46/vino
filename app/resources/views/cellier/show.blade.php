@extends('layouts.app')
@section('title', 'Gérer cellier')
@section('content')
    <main class="cellier-show-container">
        <div class="cellier-show">
            @if ($errors->any())
                <div class="cellier-show-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="cellier-show-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="cellier-show-titre">
                <h1>Modifier un Cellier</h1>
            </div>

            <form action="{{ route('cellier.update', $cellier->id) }}" method="POST" id="update-form">
                @method('PUT')
                @csrf
                <div class="cellier-show-nom">
                    <label for="nomDuCellier" class="cellier-show-edit">NOM DU CELLIER:</label>
                    <input placeholder="EX: MAISON" type="text" class="cellier-show-input" id="nom" name="nom" value="{{ old('nom', $cellier->nom) }}">
                </div>

                <div class="cellier-show-modifier">
                    <button type="button" class="cellier-show-btn-mod" onclick="confirmUpdate()">MODIFIER CELLIER</button>
                </div>
            </form>


            <form action="{{ route('cellier.destroy', $cellier->id) }}" method="POST" id="delete-form">
                @method('DELETE')
                @csrf
                <button type="button" class="cellier-show-btn-sup" onclick="confirmDelete()">SUPPRIMER CELLIER</button>
            </form>
        </div>
    </main>

    <script>
        function confirmUpdate() {
            if (confirm("Voulez-vous vraiment modifier ce cellier?")) {
                // Se o usuário confirmar, envie o formulário de atualização
                document.getElementById('update-form').submit();
            }
        }
    </script>


    <script>
        function confirmDelete() {
            if (confirm("Voulez-vous vraiment supprimer ce cellier?")) {
                // Se o usuário confirmar, envie o formulário de exclusão
                document.getElementById('delete-form').submit();
            }
        }
    </script>

    @include('layouts.footer')
@endsection
