<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[#3498DB] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#0C71B5] focus:bg-[#0C71B5] active:bg-[#0C71B5] focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
