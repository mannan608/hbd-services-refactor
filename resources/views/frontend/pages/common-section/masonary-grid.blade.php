@php
    $gallery_images = collect($gallery_images ?? [])
        ->filter()
        ->values()
        ->all();

    $count = count($gallery_images);

    $columnCount = min($count, 3);

    $columns = [];

    if ($columnCount > 0) {
        $base = intdiv($count, $columnCount);
        $remainder = $count % $columnCount;

        $start = 0;

        for ($i = 0; $i < $columnCount; $i++) {
            $size = $base + ($i < $remainder ? 1 : 0);

            $columns[] = array_slice($gallery_images, $start, $size);

            $start += $size;
        }
    }
@endphp

@if ($count)

    {{-- Mobile: 1 column --}}
    <div class="grid grid-cols-1 gap-4 md:hidden">
        @foreach ($gallery_images as $image)
            <div>
                <img src="{{ asset($image) }}" alt="Event gallery image"
                    class="block h-auto w-full rounded-xl object-cover" loading="lazy">
            </div>
        @endforeach
    </div>

    {{-- Tablet / Desktop --}}
    <div
        class="hidden gap-4 md:grid
            {{ $columnCount === 1 ? 'md:grid-cols-1' : '' }}
            {{ $columnCount === 2 ? 'md:grid-cols-2' : '' }}
            {{ $columnCount === 3 ? 'md:grid-cols-2 lg:grid-cols-3' : '' }}">
        @foreach ($columns as $column)
            <div class="grid content-start gap-4">

                @foreach ($column as $image)
                    <div>
                        <img src="{{ asset($image) }}" alt="Event gallery image"
                            class="block h-auto w-full rounded-xl object-cover" loading="lazy">
                    </div>
                @endforeach

            </div>
        @endforeach
    </div>
@else
    <div class="w-full px-4 py-3">
        <div
            class="mx-auto flex flex-col items-center justify-center rounded-2xl border border-dashed border-slate-200 bg-slate-50 p-8 text-center">
            <div class="mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-blue-50 text-blue-600">
                <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                </svg>
            </div>

            <h3 class="mb-1 text-base font-bold text-slate-900">
                No Providers Found
            </h3>

            <p class="text-sm text-slate-500">
                There are currently no providers available. Please check back later.
            </p>
        </div>
    </div>

@endif
