<header class="bg-slate-200 dark:bg-[#191a1b] border-b border-gray-400 dark:border-black shadow p-4 flex justify-between items-center transition-colors duration-300">

    <h1 class="text-xl font-semibold text-gray-700 dark:text-white">
        @yield('page_title', 'Dashboard')
    </h1>

    <div>
        @auth
            @php
                $fullName = auth()->user()->name;
                $firstName = explode(' ', trim($fullName))[0];
                $initial = strtoupper(substr($firstName, 0, 1));
            @endphp
            <a href="{{ route('profile.show') }}" wire:navigate class="flex items-center space-x-3 text-sm font-medium text-gray-600 dark:text-white hover:text-blue-600">
                <div>
                    {{ $firstName }}
                </div>

                <div class="w-8 h-8 bg-indigo-600 dark:bg-indigo-500 rounded-full flex items-center justify-center shadow-sm border border-white dark:border-gray-700">
                    <span class="text-sm font-bold text-white tracking-tighter">
                        {{ $initial }}
                    </span>
                </div>
            </a>
        @else
            <span class="text-sm text-gray-500">Guest</span>
        @endauth
    </div>
</header>
