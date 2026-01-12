@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'appearance-none block w-full px-3 py-2.5 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm']) }}>
