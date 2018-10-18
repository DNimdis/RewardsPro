@if ($paginator->hasPages())

    <ul class="pagination" >
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="disabled"><a href="#" aria-hidden="true"><i class="material-icons">chevron_left</i></a></li>
            <!-- <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span  ><i class="material-icons">chevron_left</i></span>
            </li> -->
        @else
         <li class="disabled"><a href="{{ $paginator->previousPageUrl() }}"><i class="material-icons">chevron_left</i></a></li>
            <!-- <li class="waves-effect">
                <a href="{{ $paginator->previousPageUrl() }}"  aria-label="@lang('pagination.previous')">
                <i class="material-icons">chevron_left</i></a>
            </li> -->
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                 <li class="waves-effect"><a href="#!">{{ $element }}</a></li>
                <!-- <li class="disabled" aria-disabled="true"><span >{{ $element }}</span></li> -->
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><a href="#">{{ $page }}</a></li>
                        <!-- <li class="active" aria-current="page"><span >{{ $page }}</span></li> -->
                    @else
                        <li class="active"><a href="{{ $url }}">{{ $page }}</a></li>
                        <!-- <li class="waves-effect"><a  href="{{ $url }}">{{ $page }}</a></li> -->
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
           <li class="waves-effect"><a href="{{ $paginator->nextPageUrl() }}"><i class="material-icons">chevron_right</i></a></li>
            <!-- <li class="waves-effect">
                <a  href="{{ $paginator->nextPageUrl() }}" aria-label="@lang('pagination.next')">
                  <i class="material-icons">chevron_right</i></a>
            </li> -->
        @else
          <li class="disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
            <!-- <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span  aria-hidden="true"><i class="material-icons">chevron_right</i></span>
            </li> -->
        @endif
    </ul>
@endif
