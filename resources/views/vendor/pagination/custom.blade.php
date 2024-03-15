
@if ($paginator->hasPages())
<div class="flex items-center gap-4 justify-center align-middle" hx-target="body"
hx-swap="outerHTML show:window:top"
hx-push-url="true"
>
    <button @if ($paginator->onFirstPage()) disabled @endif
      class="flex items-center gap-2 px-6 py-3 font-inter text-xs font-bold text-center text-white uppercase align-middle transition-all rounded-full select-none hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
      type="button"
      hx-get="{{ $paginator->previousPageUrl() }}">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
        aria-hidden="true" class="w-4 h-4">
        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"></path>
      </svg>
      Previous
    </button>

    <div class="flex items-center gap-2">
        @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <button
                            class="relative text-white h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-full text-center align-middle font-inter text-xs font-medium uppercase text-bg-primary shadow-md shadow-gray-100/15 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            type="button">
                                <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                    {{ $page }}
                                </span>
                        </button>
                        @else
                            <button
                                class="relative text-gray-400 h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-full text-center align-middle font-inter text-xs font-medium uppercase transition-all hover:text-bg-primary active:text-bg-primary disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                type="button"
                                hx-get="{{ $url }}"
                                >
                                <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                    {{ $page }}
                                </span>
                            </button>
                        @endif
                    @endforeach
                @endif
        @endforeach
    </div>

    <button @if (!$paginator->hasMorePages()) disabled @endif
      class="flex text-white items-center gap-2 px-6 py-3 font-inter text-xs font-bold text-cente uppercase align-middle transition-all rounded-full select-none hover:bg-gray-900/10 active:bg-white-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
      type="button"
      hx-get="{{ $paginator->nextPageUrl() }}">
      Next
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
        aria-hidden="true" class="w-4 h-4">
        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"></path>
      </svg>
    </button>
  </div> 
@endif