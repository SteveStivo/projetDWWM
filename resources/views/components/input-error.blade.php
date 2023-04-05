@props(['messages'])

@if ($errors)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 dark:text-red-400 space-y-1']) }}>
        @foreach  ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
