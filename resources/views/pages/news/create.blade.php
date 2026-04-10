@extends('layouts.app')

@section('page_title', 'Buat Berita')

@section('content')
<div class="max-w-4xl mx-auto">
    <a href="../dashboard" wire:navigate class="text-sm text-gray-500 hover:text-blue-600 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Kembali ke Dashboard
    </a>

    <div class="h-193 mt-4 rounded-xl border border-gray-400 dark:border-black overflow-y-auto [&::-webkit-scrollbar]:w-3 [&::-webkit-scrollbar-track]:bg-gray-300 [&::-webkit-scrollbar-track]:rounded-r-md [&::-webkit-scrollbar-thumb]:bg-gray-400 [&::-webkit-scrollbar-thumb]:rounded-r-md">
        <div class="bg-white dark:bg-[#191a1b]">
            <div class="p-6 border-b border-gray-400 dark:border-black">
                <h1 class="text-xl font-bold text-gray-800 dark:text-white">Tulis Berita Baru</h1>
                <p class="text-sm text-gray-500 dark:text-gray-400">Isi formulir di bawah untuk membuat artikel.</p>
            </div>

            <form action="{{ route('news.store') }}" method="POST" class="p-6 space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-white mb-1 pl-2">Judul Berita</label>
                    <input type="text" name="title" value="{{ old('title') }}" placeholder="Masukkan judul yang menarik..."
                        class="w-full px-4 py-2 border border-gray-400 dark:border-black rounded-lg focus:border-blue-500 hover:bg-gray-400 dark:hover:bg-gray-600 focus:bg-white dark:focus:bg-[#191a1b] outline-none transition duration-400">
                    @error('title') <span class="text-red-500 text-xs mt-1 italic">{{ $message }}</span> @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 text-gray-700 dark:text-white">
                    <div>
                        <label class="block text-sm font-medium mb-1 pl-2">Penulis</label>
                        <input type="text" name="author" value="{{ old('author') }}" placeholder="Nama jurnalis..."
                            class="w-full px-4 py-2 border border-gray-400 dark:border-black rounded-lg focus:border-blue-500 hover:bg-gray-400 dark:hover:bg-gray-600 focus:bg-white dark:focus:bg-[#191a1b] outline-none transition duration-400">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1 pl-2">Pilih Kategori</label>
                        <select name="category_id" class="w-full pl-4 py-2 border border-gray-400 dark:border-black rounded-lg  focus:border-blue-500 hover:bg-gray-400 dark:hover:bg-gray-600 focus:bg-white dark:focus:bg-[#191a1b] outline-none appearance-none bg-no-repeat bg-right pr-10 transition duration-400"
                                                style="background-image: url('data:image/svg+xml;charset=utf-8,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 fill=%27none%27 viewBox=%270 0 20 20%27%3E%3Cpath stroke=%27%236b7280%27 stroke-linecap=%27round%27 stroke-linejoin=%27round%27 stroke-width=%271.5%27 d=%27m6 8 4 4 4-4%27/%3E%3C/svg%3E'); background-size: 1.5em 1.5em; background-position: right 0.20rem center;">
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }} class="dark:bg-[#2a2b2d] hover:bg-[#3d4042]">
                                    {{ $parentName = $cat->parent->name ?? 'Global' }} - {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1 pl-2 text-gray-700 dark:text-white">Isi Berita</label>
                    <textarea name="content" rows="10"
                            class="w-full min-h-86.25 px-4 py-2 border border-gray-400 dark:border-black rounded-lg focus:border-blue-500 hover:bg-gray-400 dark:hover:bg-gray-600 focus:bg-white dark:focus:bg-[#191a1b] outline-none transition duration-400 [&::-webkit-scrollbar]:w-3 [&::-webkit-scrollbar-track]:bg-gray-300 [&::-webkit-scrollbar-track]:rounded-r-md [&::-webkit-scrollbar-thumb]:bg-gray-400 [&::-webkit-scrollbar-thumb]:rounded-r-md">{{old('content')}}</textarea>
                </div>

                <div class="flex justify-end gap-3 pt-4">
                    <button type="reset" class="px-6 py-2 border border-gray-400 dark:border-black rounded-lg text-gray-600 dark:text-white hover:bg-gray-400 transition duration-400">
                        Kosongkan Form
                    </button>
                    <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 shadow-md transition duration-400">
                        Simpan Berita
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
