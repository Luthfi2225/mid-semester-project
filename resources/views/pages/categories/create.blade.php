@extends('layouts.app')

@section('page_title', 'Buat Kategori')

@section('content')
<div class="max-w-xl mx-auto">
    <div class="mb-4">
        <button type="button" onclick="confirmBackCategories('{{ route('categories.index') }}')" class="text-sm text-gray-500 hover:text-blue-500 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Kategori
        </button>
    </div>

    <div class="border border-gray-400 dark:border-black rounded-xl">
        <div class="bg-white dark:bg-[#191a1b] rounded-xl">
            <div class="p-6 border-b border-gray-400 dark:border-black">
                <h1 class="text-xl font-bold text-gray-800 dark:text-white">Buat Kategori Baru</h1>
                <p class="text-sm text-gray-500 dark:text-gray-400">Isi formulir di bawah untuk membuat kategori.</p>
            </div>

            <form action="{{ route('categories.store') }}" method="POST" class="p-6 space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-medium mb-1 pl-2">Nama Kategori</label>
                    <input type="text" id="name" name="name" placeholder="Masukkan nama kategori..."
                        class="w-full px-4 py-2 border border-gray-400 dark:border-black rounded-lg focus:border-blue-500 hover:bg-gray-400 dark:hover:bg-gray-600 focus:bg-white dark:focus:bg-[#191a1b] outline-none transition duration-400">
                    @error('slug')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    </div>

                <div>
                    <label class="block text-sm font-medium mb-1 pl-2">Tipe Kategori</label>
                    @if ($isParent)
                        <select disabled class="disabled:cursor-not-allowed w-full px-4 py-2 font-bold bg-gray-300 dark:bg-[#343638] border border-gray-400 dark:border-black text-gray-400 rounded-lg appearance-none bg-no-repeat bg-right pr-10 outline-none transition duration-400"
                                                style="background-image: url('data:image/svg+xml;charset=utf-8,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 fill=%27none%27 viewBox=%270 0 20 20%27%3E%3Cpath stroke=%27%236b7280%27 stroke-linecap=%27round%27 stroke-linejoin=%27round%27 stroke-width=%271.5%27 d=%27m6 8 4 4 4-4%27/%3E%3C/svg%3E'); background-size: 1.5em 1.5em; background-position: right 0.20rem center;">
                            <option value="">
                                Kategori Utama
                            </option>
                        </select>
                    @else
                        <select name="parent_id" class="w-full pl-4 py-2 border border-gray-400 dark:border-black rounded-lg  focus:border-blue-500 hover:bg-gray-400 dark:hover:bg-gray-600 focus:bg-white dark:focus:bg-[#191a1b] outline-none appearance-none bg-no-repeat bg-right pr-10 transition duration-400"
                                                style="background-image: url('data:image/svg+xml;charset=utf-8,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 fill=%27none%27 viewBox=%270 0 20 20%27%3E%3Cpath stroke=%27%236b7280%27 stroke-linecap=%27round%27 stroke-linejoin=%27round%27 stroke-width=%271.5%27 d=%27m6 8 4 4 4-4%27/%3E%3C/svg%3E'); background-size: 1.5em 1.5em; background-position: right 0.20rem center;">
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" class="bg-gray-200 dark:bg-[#35373a]">
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    @endif
                </div>


                <div class="flex justify-end gap-3 pt-4">
                    <button type="reset" class="px-6 py-2 border border-gray-400 rounded-lg text-gray-600 hover:bg-gray-300 transition duration-400">
                        Kosongkan Form
                    </button>
                    <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 shadow-md transition duration-400">
                        Buat Kategori
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
