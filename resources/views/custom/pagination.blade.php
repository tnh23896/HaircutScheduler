<style>
    .custom-pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
    }

    .custom-pagination .custom-page-link,
    .custom-pagination .active span {
        text-decoration: none;
        color: #d9842f;
        padding: 8px 16px;
        border: 1px solid #d9842f;
        border-radius: 4px;
        margin: 0 5px;
        display: inline-block;
        transition: background-color 0.3s, color 0.3s;
        min-width: 40px;
        text-align: center;
    }

    .custom-pagination .custom-page-link:hover,
    .custom-pagination .custom-page-link:active,
    .custom-pagination .active span {
        background-color: #d9842f;
        color: #fff;
    }

    .custom-pagination .custom-first,
    .custom-pagination .custom-last {
        min-width: auto;
    }

    .custom-pagination .custom-page-item.disabled .custom-page-link,
    .custom-pagination .custom-page-item.disabled .custom-page-link:hover {
        background-color: #ddd !important;
        color: #999 !important;
        pointer-events: none !important;
    }

    .custom-pagination li {
        list-style: none;
    }
</style>

@if ($paginator->hasPages())
    <nav aria-label="Pagination">
        <ul class="custom-pagination justify-content-center align-items-center">
            @php
                $showPageNumbers = true; 
                $visiblePageRange = 4; 
                $totalPages = $paginator->lastPage();
                $currentPage = $paginator->currentPage();
            @endphp

            @if ($paginator->onFirstPage())
                <li class="custom-first disabled"><span class="custom-page-link">Trang trước</span></li>
            @else
                <li class="custom-first"><a class="custom-page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">Trang trước</a></li>
            @endif

            @if ($showPageNumbers)
                @php
                    $start = max(1, min($totalPages - $visiblePageRange + 1, $currentPage - floor($visiblePageRange / 2)));
                    $end = min($totalPages, $start + $visiblePageRange - 1);
                @endphp

                @if ($start > 1)
                    <li class="custom-page-item"><a class="custom-page-link" href="{{ $paginator->url(1) }}">1</a></li>
                    @if ($start > 2)
                        <li class="dots"><span class="custom-page-link">...</span></li>
                    @endif
                @endif

                @for ($page = $start; $page <= $end; $page++)
                    @if ($page == $currentPage)
                        <li class="custom-page-item active" aria-current="page"><span class="custom-page-link">{{ $page }}</span></li>
                    @else
                        <li class="custom-page-item"><a class="custom-page-link" href="{{ $paginator->url($page) }}">{{ $page }}</a></li>
                    @endif
                @endfor

                @if ($currentPage < $totalPages - $visiblePageRange + 1)
                    @if ($currentPage < $totalPages - $visiblePageRange)
                        <li class="dots"><span class="custom-page-link">...</span></li>
                    @endif
                    <li class="custom-page-item"><a class="custom-page-link" href="{{ $paginator->url($totalPages - 1) }}">{{ $totalPages - 1 }}</a></li>
                    <li class="custom-page-item"><a class="custom-page-link" href="{{ $paginator->url($totalPages) }}">{{ $totalPages }}</a></li>
                @endif
            @endif

            @if ($paginator->hasMorePages())
                <li class="custom-last"><a class="custom-page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Trang sau</a></li>
            @else
                <li class="custom-last disabled"><span class="custom-page-link">Trang sau</span></li>
            @endif
        </ul>
    </nav>
@endif