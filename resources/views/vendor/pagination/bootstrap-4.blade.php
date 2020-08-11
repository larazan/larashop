@if ($paginator->hasPages())
<nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}">
                        <i class="ti-angle-left"></i>
                    </a>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" >
                        <i class="ti-angle-left"></i>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active"><a href="{{ $url }}">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}">
                        <i class="ti-angle-right"></i>
                    </a>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}">
                        <i class="ti-angle-right"></i>
                    </a>
                </li>
            @endif
        </ul>
</nav>
@endif
