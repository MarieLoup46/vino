@extends('layouts.app')
@section('title', 'Liste des usagers')
@section('content')
    <div>
        <div class="auth__header">
            <h1 class="auth__header_h1-title">Liste des usagers</h1>
        </div>

        <!-- Message affiché lorsqu'un usager est supprimé -->
        @if(session('success'))
            <div class="auth_success auth__success_delete">
                {{session('success')}}
            </div>
        @endif

        <div class="auth__user-list">
            <table>
                <thead>
                    <tr>
                        <th class="auth__user-list_th">Id</th>
                        <th class="auth__user-list_th">Nom</th>
                        <th class="auth__user-list_th">Prénom</th>
                        <th class="auth__user-list_th"></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Affiche les utilisateurs -->
                    @forelse($users as $user)
                        <tr>
                            <td class="auth__user-list_td">{{ $user->id }}</td>
                            <td class="auth__user-list_td">{{ $user->nom }}</td>
                            <td class="auth__user-list_td">{{ $user->prenom }}</td>
                            <td class="auth__user-list_td">
                            <form action="{{ route('user.delete', $user->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input class="auth__user-list_btn" type="submit" onclick="return confirm('Êtes-vous sûre de vouloir supprimer cet usager')" value="SUPPRIMER">
                            </form>
                            </td>
                        </tr>
                    @empty
                        <td class="auth__user-list_td" colspan="4">Aucun usagé disponible</td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
@include('layouts.footer')
