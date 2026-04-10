@extends('layouts.app')

@section('page_title', 'Pengaturan')

@section('content')

<div class="mx-auto bg-white dark:bg-[#202122] border border-gray-400 dark:border-black p-6 rounded shadow-md max-w-md space-y-6 text-gray-900 dark:text-gray-100">
    <div class="flex justify-between items-center">
        <div class="font-medium">Ubah Mode</div>

        <label class="relative inline-flex items-center cursor-pointer select-none">
            <input type="checkbox" id="dark-mode-checkbox" class="sr-only peer">

            <div class="w-14 h-8 bg-gray-300 rounded-full p-1 transition-colors duration-300 peer-checked:bg-indigo-600">
                <div class="dot w-6 h-6 bg-white rounded-full shadow-md transform transition-transform duration-300 flex items-center justify-center translate-x-0 peer-checked:translate-x-6">

                    <svg id="sun-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-yellow-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M3 12h2.25m.386-6.364l1.591 1.591M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                    </svg>

                    <svg id="moon-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-indigo-600 hidden">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                    </svg>

                </div>
            </div>
        </label>
    </div>
</div>

@endsection
