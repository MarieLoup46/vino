@extends('layouts.app')

@section('title', 'Celliers')

@section('content')
<main class="cellier-index-container">
    <header class="cellier-index-titre">
        <h1>Vos celliers</h1>
        <div class="cellier-index-btn">
            <form action="{{ route('cellier.create') }}" method="GET">
                <button type="submit" class="cellier-index-btn-ajouter">AJOUTER UN CELLIER</button>
        </div>
    </header>
    <section class="cellier-index-list">
        @foreach($items as $index => $item)
        <article class="cellier-index-item">
            <div onclick="event.stopPropagation(); navigateTo('{{ route('cellier.bouteilles.list', ['cellierId' => $item->id]) }}')" class="cellier-index-select">
                <img alt="{{ $item->nom }}" src="{{ asset('icons/' . $random_icon) }}" class="cellier-index-icon" />
                <div class="cellier-index-item-content">
                    <div class="cellier-index-name">{{ $item->nom }}</div>
                    <small class="cellier-index-bottle-count">
                        {{ count($item->bouteilles) }} Bouteille
                    </small>
                </div>
                </a>
        </article>
        @endforeach
        {{ $items->links() }}
    </section>

    <script type="text/javascript">
        function navigateTo(url) {
            window.location.href = url;
        }
    </script>



</main>
@include('layouts.footer')
@endsection

