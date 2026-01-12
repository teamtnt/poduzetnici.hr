<button {{ $attributes->merge(['type' => 'submit', 'class' => 'py-2.5 px-4 border border-transparent rounded-lg shadow-lg shadow-primary-500/30 text-sm font-bold text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-all']) }}>
    {{ $slot }}
</button>
