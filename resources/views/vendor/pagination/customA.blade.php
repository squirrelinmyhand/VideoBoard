<link href="{{ asset('css/pagination.css') }}" rel="stylesheet">
@if ($paginator->hasPages())
<ul class="pagination">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <span class="page-link" aria-hidden="true"><이전</span>
        </li>
    @else
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><이전</a>
        </li>
    @endif

    <?php
        $start = $paginator->currentPage() - 9; // show 3 pagination links before current
        $end = $paginator->currentPage() + 9; // show 3 pagination links after current
        if($start < 1) {
            $start = 1; // reset start to 1
            $end += 1;
        }

        if($end >= $paginator->lastPage()) {
            $end = $paginator->lastPage(); // reset end to last page
        }
    ?>

    @if($start > 1)

        
    @endif
    @for ($i = $start; $i <= $end; $i++)
        <li class="page-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
            <a class="page-link" href="{{ $paginator->url($i) }}">{{$i}}</a>
        </li>
    @endfor
    @if($end < $paginator->lastPage())
        
    @endif

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">다음 ></a>
        </li>
    @else
        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
            <span class="page-link" aria-hidden="true">다음 ></span>
        </li>
    @endif
</ul>
@endif
