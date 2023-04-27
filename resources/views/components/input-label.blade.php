@props(['value'])

<label {{ $attributes->merge(['class' => "before:content-['*'] before:text-red-500 block font-medium text-sm text-gray-700 dark:text-gray-300"]) }}>
    {{ $value ?? $slot }} :
</label>
