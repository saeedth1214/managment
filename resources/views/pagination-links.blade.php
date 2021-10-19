@if ($paginator->hasPages())

<ul class="flex flex-row justify-between text-center">


    {{-- prev --}}
    @if ($paginator->onFirstPage())
    <li class="w-16 d-inline text-center px-3 py-1 rounded border bg-gray-100">prev</li>    
    @else
    <li wire:click="previousPage('page')"  style="cursor:pointer" class="w-16 d-inline text-center px-3 py-1 rounded border shadow bg-white">prev</li>    
    @endif
    {{-- prev end --}}

    {{-- elements --}}


    @foreach ($elements as $element)
    
         @if (is_array($element))
            @foreach ($element as $page => $url) 
            
        @if ($page == $paginator->currentPage())
        <li  style="cursor:pointer" class=" d-inline-block text-center mx-1 px-3 py-1 rounded border shadow bg-primary">{{$page}}</li>                
        @else
        <li wire:click="gotoPage({{$page}},'page')" style="cursor:pointer" class=" d-inline-block text-center mx-1 px-3 py-1 rounded border shadow bg-white">{{$page}}</li>    
        @endif
            @endforeach
            @endif
    @endforeach
    {{-- elements end --}}


    {{-- next --}}
    @if ($paginator->hasMorePages())
    <li wire:click="nextPage('page')"  style="cursor:pointer" class="w-16 d-inline text-center px-3 py-1 rounded border shadow bg-white">next</li>    
    @else
    <li class="w-16 d-inline text-center px-3 py-1 rounded border bg-gray-100">next</li>    
    @endif


    {{-- next end --}}

</ul>
    
@endif