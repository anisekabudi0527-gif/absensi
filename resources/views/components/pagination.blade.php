@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination" class="flex items-center justify-between gap-3">
        {{-- Mobile (Prev/Next) --}}
        <div class="flex flex-1 justify-between sm:hidden">
            @if ($paginator->onFirstPage())
                <span
                    class="inline-flex items-center rounded-2xl border border-slate-200 bg-slate-50 px-4 py-2 text-sm text-slate-400">
                    Prev
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="inline-flex items-center rounded-2xl border border-slate-200 bg-white px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">
                    Prev
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="inline-flex items-center rounded-2xl bg-indigo-950 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-900">
                    Next
                </a>
            @else
                <span
                    class="inline-flex items-center rounded-2xl border border-slate-200 bg-slate-50 px-4 py-2 text-sm text-slate-400">
                    Next
                </span>
            @endif
        </div>

        {{-- Desktop --}}
        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
            <div class="text-sm text-slate-500">
                Menampilkan
                <span class="font-semibold text-slate-700">{{ $paginator->firstItem() }}</span>
                -
                <span class="font-semibold text-slate-700">{{ $paginator->lastItem() }}</span>
                dari
                <span class="font-semibold text-slate-700">{{ $paginator->total() }}</span>
                data
            </div>

            <div>
                <span class="inline-flex items-center gap-1 rounded-2xl border border-slate-200 bg-white p-1">
                    {{-- Previous --}}
                    @if ($paginator->onFirstPage())
                        <span class="inline-flex h-10 w-10 items-center justify-center rounded-xl text-slate-300">
                            ‹
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}"
                            class="inline-flex h-10 w-10 items-center justify-center rounded-xl text-slate-700 hover:bg-slate-50">
                            ‹
                        </a>
                    @endif

                    {{-- Elements --}}
                    @foreach ($elements as $element)
                        {{-- Dots --}}
                        @if (is_string($element))
                            <span class="inline-flex h-10 items-center justify-center px-3 text-slate-400">
                                {{ $element }}
                            </span>
                        @endif

                        {{-- Array of links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page"
                                        class="inline-flex h-10 min-w-[40px] items-center justify-center rounded-xl bg-indigo-950 px-3 text-sm font-semibold text-white">
                                        {{ $page }}
                                    </span>
                                @else
                                    <a href="{{ $url }}"
                                        class="inline-flex h-10 min-w-[40px] items-center justify-center rounded-xl px-3 text-sm font-medium text-slate-700 hover:bg-slate-50">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}"
                            class="inline-flex h-10 w-10 items-center justify-center rounded-xl text-slate-700 hover:bg-slate-50">
                            ›
                        </a>
                    @else
                        <span class="inline-flex h-10 w-10 items-center justify-center rounded-xl text-slate-300">
                            ›
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
