<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Cellier</title>
    <link href="{{ asset('css/global.css') }}" rel="stylesheet">
</head>
<body>
    <div class="app-container">
        <h1 class="page-title">Ajouter un Cellier</h1>
        <form action="{{ url('/cellier') }}" method="POST" class="form-cellier">
            @csrf
            <div class="form-group">
                <label for="nomDuCellier">Nom du cellier:</label>
                <input type="text" class="form-control" id="nomDuCellier" name="nom" placeholder="">
            </div>
            <button type="submit" class="btn-submit">Créer un cellier</button>
        </form>
    </div>
</body>
</html>
