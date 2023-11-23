@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="pagination text-center">
        <div>
            <div class="info-page">
                <p>
                    <span>de</span>
                    @if ($paginator->firstItem())
                        <span>{{ $paginator->firstItem() }}</span>
                        <span>à</span>
                        <span>{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    <span>sur</span>
                    <span>{{ $paginator->total() }}</span>
                    <span>résultats</span>
                </p>
            </div>

            <div class="liste-pages">
                    {{-- Previous Page Link --}}
                    @if (!$paginator->onFirstPage())
                        <a class="text-center" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="{{ __('pagination.previous') }}">
                            <span class="avant-btn"><-</span>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- Array Of Links --}}
                        @if (is_array($element) && $element == $elements[0])
                            {{-- elements du pagination --}}
                            <?php

                                $pageActuelle = $paginator->currentPage();
                                $debutPage = max(1, $pageActuelle - 2); // Ensure startPage is at least 1
                                $finPage = min($paginator->lastPage(), $pageActuelle + 2); // Ensure endPage is at most lastPage
                                if($finPage - $debutPage < 5) $finPage = $debutPage + 4;
                                if($debutPage - $finPage < 5) $debutPage = $finPage - 4;
                            ?>
                            @foreach ($paginator->getUrlRange($debutPage, $finPage) as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span class="current-page-container" aria-current="page">
                                        <span class="current-page">{{ $page }}</span>
                                    </span>
                                @else
                                    <a class="page text-center" href="{{ $url }}"  aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        <span>{{ $page }}</span>
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a class="text-center" href="{{ $paginator->nextPageUrl() }}" rel="next"  aria-label="{{ __('pagination.next') }}">
                            <span class="apres-btn">-></span>
                        </a>
                    @endif
            </div>
        </div>
    </nav>
@endif
