@extends('layouts.app')

@section('page_title', 'Daftar Kategori')

@section('content')
<div class="rounded-md overflow-y-auto [&::-webkit-scrollbar]:w-3 [&::-webkit-scrollbar-track]:bg-gray-300 [&::-webkit-scrollbar-track]:rounded-r-md [&::-webkit-scrollbar-thumb]:bg-gray-400 [&::-webkit-scrollbar-thumb]:rounded-r-md">
    <div class="px-6 pb-5 flex justify-between items-center">
        <div>
            <h1 class="text-xl font-bold text-gray-800 dark:text-white">Kategori Utama</h1>
        </div>
        <a href="/categories/create?is_parent=true" wire:navigate class="w-37.75 text-center bg-blue-600 text-white hover:bg-blue-700 px-4 py-1 rounded-lg text-xs font-bold shadow-sm transition duration-400">
            Buat Kategori Utama
        </a>
    </div>
    <div class="bg-white dark:bg-[#191a1b] border border-gray-400 dark:border-black h-43 rounded-md overflow-y-auto [&::-webkit-scrollbar]:w-3 [&::-webkit-scrollbar-track]:bg-gray-300 [&::-webkit-scrollbar-track]:rounded-r-md [&::-webkit-scrollbar-thumb]:bg-gray-400 [&::-webkit-scrollbar-thumb]:rounded-r-md">
        <table class="w-full text-left">
            <thead class="sticky top-0 bg-gray-200 dark:bg-[#141415] border-b border-gray-400 dark:border-black">
                <tr class="text-gray-800 dark:text-white">
                    <th class="p-4 text-sm font-semibold">Kategori</th>
                    <th class="p-4 text-sm font-semibold">Terakhir Diubah</th>
                    <th class="p-4 text-sm font-semibold">Tanggal Dibuat</th>
                    <th class="p-4 text-sm font-semibold text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-400 dark:divide-black">
                @forelse($all_category->whereNull('parent_id') as $categories)
                <tr class=" hover:bg-gray-400 dark:hover:bg-gray-600 text-gray-800 dark:text-white transition">
                    <td class="p-4 text-sm">{{ $categories->name}}</td>
                    <td class="p-4">
                        {{ $categories->updated_at }}
                    </td>
                    <td class="p-4">
                        {{ $categories->created_at }}
                    </td>
                    <td class="p-4 text-center">
                        <div class="flex justify-center gap-3">
                            <a href="{{ route('categories.edit', [$categories->id]) }}?is_parent=true" wire:navigate class="border border-gray-300 text-gray-600 dark:text-white hover:bg-gray-300 dark:hover:text-black px-4 py-1 rounded-lg text-xs font-bold transition duration-400">Edit</a>
                            <form action="{{ route('categories.destroy', [$categories->id]) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white hover:bg-red-700 px-4 py-1 rounded-lg text-xs font-bold shadow-sm transition duration-400">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-8 text-center text-gray-500">Belum ada kategori utama yang tersedia.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-6 py-5 flex justify-between items-center">
        <div>
            <h1 class="text-xl font-bold text-gray-800 dark:text-white">Sub Kategori</h1>
        </div>
        <a href="/categories/create?is_parent=false" wire:navigate class="w-37.75 text-center bg-blue-600 text-white hover:bg-blue-700 px-4 py-1 rounded-lg text-xs font-bold shadow-sm transition duration-400">
            Buat Sub Kategori
        </a>
    </div>
    <div class="bg-white dark:bg-[#191a1b] border border-gray-400 dark:border-black h-137.5 rounded-md overflow-y-auto [&::-webkit-scrollbar]:w-3 [&::-webkit-scrollbar-track]:bg-gray-300 [&::-webkit-scrollbar-track]:rounded-r-md [&::-webkit-scrollbar-thumb]:bg-gray-400 [&::-webkit-scrollbar-thumb]:rounded-r-md">
        <table class="w-full text-left">
            <thead class="sticky top-0 bg-gray-200 dark:bg-[#141415] border-b border-gray-400 dark:border-black">
                <tr class="text-gray-800 dark:text-white">
                    <th class="p-4 text-sm font-semibold">Kategori</th>
                    <th class="p-4 text-sm font-semibold">Kategori Utama</th>
                    <th class="p-4 text-sm font-semibold">Terakhir Diubah</th>
                    <th class="p-4 text-sm font-semibold">Tanggal Dibuat</th>
                    <th class="p-4 text-sm font-semibold text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-400 dark:divide-black">
                @forelse($all_category->whereNotNull('parent_id') as $categories)
                <tr class=" hover:bg-gray-400 dark:hover:bg-gray-600 text-gray-800 dark:text-white transition">
                    <td class="p-4 text-sm">{{ $categories->name }}</td>
                    <td class="p-4 text-sm">
                        {{ $categories->parent->name }}
                    </td>
                    <td class="p-4">
                        {{ $categories->updated_at }}
                    </td>
                    <td class="p-4">
                        {{ $categories->created_at }}
                    </td>
                    <td class="p-4 text-center">
                        <div class="flex justify-center gap-3">
                            <a href="{{ route('categories.edit', [$categories->id]) }}?is_parent=false" wire:navigate class="border border-gray-300 text-gray-600 dark:text-white hover:bg-gray-300 dark:hover:text-black px-4 py-1 rounded-lg text-xs font-bold transition duration-400">Edit</a>
                            <form action="{{ route('categories.destroy', [$categories->id]) }}" method="POST" onsubmit="return confirm('Semua Berita dengan kategori ini juga akan ikut terhapus,\nApakah Anda yakin ingin menghapus berita ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white hover:bg-red-700 px-4 py-1 rounded-lg text-xs font-bold shadow-sm transition duration-400">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-8 text-center text-gray-500">Belum ada sub kategori yang tersedia.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
