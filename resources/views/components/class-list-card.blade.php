@props(['class', 'link', 'lecturer'])

<div>
    <div class="max-w-md min-h-full p-6 flex flex-col gap-3 justify-between bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $class }}</h5>
        </a>
        <div>
            @foreach ($lecturer as $item)
            <p class="font-normal text-gray-700 dark:text-gray-400">{{ $item->name }}</p>
            @endforeach
        </div>
        <a href="{{ $link }}">
            <x-button type='default'>Registration</x-button>
        </a>
    </div>
</div>
