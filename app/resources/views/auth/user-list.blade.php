<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Liste des usagers</title>
</head>
<body>
    <div>
        <div class="auth__header">
            <h1 class="auth_header_u-list-title">Liste des usagers</h1>
        </div>

        <div class="auth_user-list">
            <table>
                <thead>
                    <tr>
                        <th class="auth_user-list_th">Id</th>
                        <th class="auth_user-list_th">Nom</th>
                        <th class="auth_user-list_th">Prénom</th>
                        <th class="auth_user-list_th">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Affiche les utilisateurs -->
                    @foreach($users as $user)
                        <tr>
                            <td class="auth_user-list_td">{{ $user->id }}</td>
                            <td class="auth_user-list_td">{{ $user->nom }}</td>
                            <td class="auth_user-list_td">{{ $user->prenom }}</td>
                            <td class="auth_user-list_td">
                                supprimer
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>   
</body>

<footer class="footer">
    <img src="/icons/home.png" class="footer-icon"/>
    <img src="/icons/moncellier.png" class="footer-icon"/>
    <img src="/icons/rechercher.png" class="footer-icon"/>
    <img src="/icons/profil.png" class="footer-icon"/>
</footer>

</html>
