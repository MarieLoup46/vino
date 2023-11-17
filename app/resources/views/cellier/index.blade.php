@extends('layouts.app')

@section('title', 'Celliers')

@section('content')
<main class="cellier-index-container">
    <header class="cellier-index-titre">
        <h3>Vos celliers</h3>
        <div class="cellier-index-btn">
            <form action="{{ route('cellier.create') }}" method="GET">
            <button type="submit" class="cellier-index-btn-ajouter">AJOUTER UN CELLIER</button>
        </div>
    </header>
    <section class="cellier-index-liste">
        @foreach($items as $index => $item)
        <article class="cellier-index-item">
            <a href="{{ route('cellier.show', $item->id) }}" class="cellier-index-select">
                <img src="{{ asset('icons/' . $random_icon) }}" alt="{{ $item->nom }}" class="cellier-index-img" />
                <div class="cellier-index-info">
                    <h2 class="cellier-index-nom">{{ $item->nom }}</h2>
                    <p class="cellier-index-bouteille-count">{{ $index }} Bouteille</p>
                </div>
            </a>
        </article>
        @endforeach
    </section>

    <nav class="RENOMEIE">
        <ul class="RENOMEIE">
            <li class="RENOMEIE"><a href="#" class="RENOMEIE">←</a></li>
            <li class="RENOMEIE"><a href="#" class="RENOMEIE">1</a></li>
            <li class="RENOMEIE"><a href="#" class="RENOMEIE">2</a></li>
            <li class="RENOMEIE"><a href="#" class="RENOMEIE">3</a></li>
            <li class="RENOMEIE"><a href="#" class="RENOMEIE">→</a></li>
        </ul>
    </nav>
</main>
@endsection

@include('layouts.footer')