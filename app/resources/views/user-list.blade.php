@section('title', 'Liste usagers')
@section('content')
    <div>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Affiche les utilisateurs -->
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                supprimer
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users }}
        </div>
    </div>
@endsection