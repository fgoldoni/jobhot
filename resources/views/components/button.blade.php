<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn inline-flex items-center px-4 py-2  font-semibold text-xs uppercase tracking-widest disabled:opacity-25 disabled:cursor-not-allowed']) }}>
    {{ $slot }}
</button>
