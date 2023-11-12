<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Recherche</title>

</head>
<body>
    <div class="body__container">
        <div class="auth__header">
            <h1>Recherche</h1>
        </div>
        <div>
            <div class="auth__col">
                @foreach($bouteilles as $bouteille)
                    <div class="recherche__container">
                        <div class="img__container">
                            <img src="{{$bouteille->url_img}}" class="recherche__img">
                        </div>
                        <div class="bouteille__info">
                            <p class="bouteille__nom">{{$bouteille->nom}}</p>
                            <p class="bouteille__color">{{$bouteille->pays}} | {{$bouteille->type_id}} | {{$bouteille->format}}</p>
                            <p class="bouteille__prix">{{$bouteille->prix_saq}} $</p>
                            <p><a class="bouteille__lien" href="{{$bouteille->url_saq}}">voir plus</a></p>
                        </div>
                    </div>   
                @endforeach
            </div>
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
