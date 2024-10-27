@if ($paginator->hasPages())
    <nav>
        <ul class="pagination pagination-rounded justify-content-end">
            {{-- Botón de "Primera" --}}
            @if (!$paginator->onFirstPage())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->url(1) }}" aria-label="Primera página">«</a>
                </li>
            @endif

            {{-- Botón de "Anterior" --}}
            {{-- @if ($paginator->onFirstPage())
                <li class="page-item disabled"><span class="page-link">«</span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">«</a></li>
            @endif --}}

            {{-- Enlaces de páginas con límite de 5 --}}
            @if ($paginator->lastPage() <= 5)
                {{-- Mostrar todas las páginas si son 5 o menos --}}
                @for ($page = 1; $page <= $paginator->lastPage(); $page++)
                    <li class="page-item {{ $page == $paginator->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $paginator->url($page) }}">{{ $page }}</a>
                    </li>
                @endfor
            @else
                {{-- Mostrar las primeras 5 páginas si la actual está cerca del principio --}}
                @if ($paginator->currentPage() <= 3)
                    @for ($page = 1; $page <= 5; $page++)
                        <li class="page-item {{ $page == $paginator->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $paginator->url($page) }}">{{ $page }}</a>
                        </li>
                    @endfor
                {{-- Mostrar las últimas 5 páginas si la actual está cerca del final --}}
                @elseif ($paginator->currentPage() >= $paginator->lastPage() - 2)
                    @for ($page = $paginator->lastPage() - 4; $page <= $paginator->lastPage(); $page++)
                        <li class="page-item {{ $page == $paginator->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $paginator->url($page) }}">{{ $page }}</a>
                        </li>
                    @endfor
                {{-- Mostrar 5 páginas alrededor de la página actual en las posiciones intermedias --}}
                @else
                    @for ($page = $paginator->currentPage() - 2; $page <= $paginator->currentPage() + 2; $page++)
                        <li class="page-item {{ $page == $paginator->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $paginator->url($page) }}">{{ $page }}</a>
                        </li>
                    @endfor
                @endif
            @endif

            {{-- Botón de "Siguiente" --}}
            {{-- @if ($paginator->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">»</a></li>
            @else
                <li class="page-item disabled"><span class="page-link">»</span></li>
            @endif --}}

            {{-- Botón de "Última" --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}" aria-label="Última página">»</a>
                </li>
            @endif
        </ul>
    </nav>
@endif
