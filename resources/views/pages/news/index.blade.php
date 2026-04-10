@extends('layouts.app')

@section('page_title', 'Daftar Berita')

@section('content')
<div class="bg-white dark:bg-[#191a1b] border border-gray-400 dark:border-black h-209.75 rounded-md overflow-y-auto [&::-webkit-scrollbar]:w-3 [&::-webkit-scrollbar-track]:bg-gray-300 [&::-webkit-scrollbar-track]:rounded-r-md [&::-webkit-scrollbar-thumb]:bg-gray-400 [&::-webkit-scrollbar-thumb]:rounded-r-md">
    <table class="w-full text-left">
        <thead class="sticky top-0 bg-gray-200 dark:bg-[#141415] border-b border-gray-400 dark:border-black">
            <tr class="text-gray-800 dark:text-white">
                <th class="p-4 text-sm font-semibold ">Judul Berita</th>
                <th class="p-4 text-sm font-semibold">Penulis</th>
                <th class="p-4 text-sm font-semibold">Kategori</th>
                <th class="p-4 text-sm font-semibold">Status</th>
                <th class="p-4 text-sm font-semibold text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-gray-800 divide-y divide-gray-400 dark:divide-black">
            @forelse($all_news as $news)
            <tr class=" hover:bg-gray-400 dark:hover:bg-gray-600 text-gray-800 dark:text-white transition">
                <td class="p-4 text-sm">{{ $news->title }}</td>
                <td class="p-4 text-sm">{{ $news->author }}</td>
                <td class="p-3">
                    <span class="text-xs block uppercase">
                        {{ $news->category->parent->name ?? 'Global' }}
                    </span>
                    <span class="font-medium">
                        {{ $news->category->name }}
                    </span>
                </td>
                <td class="p-4">
                    <span class="{{ $news->published_at == '' ? 'bg-yellow-200 text-yellow-700' : 'bg-green-200 text-green-700' }} inline-block w-35 text-center px-3 py-1 rounded-full text-xs font-medium">
                        {{ $news->published_at == '' ? 'Belum di publikasi' : ucfirst($news->published_at) }}
                    </span>
                </td>
                <td class="p-4 text-center">
                    <div class="flex justify-center gap-3">
                        <a href="{{ route('news.edit', [$news->id, 'from' => 'index']) }}" wire:navigate class="border border-gray-300 hover:bg-gray-300 dark:hover:text-black px-4 py-1 rounded-lg text-xs font-bold transition duration-400">Edit</a>
                        <form action="{{ route('news.destroy', [$news->id, 'from' => 'index']) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white hover:bg-red-700 px-4 py-1 rounded-lg text-xs font-bold shadow-sm transition duration-400">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="p-8 text-center text-gray-500">Belum ada berita yang tersedia.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
