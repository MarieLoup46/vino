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
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span>{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
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
