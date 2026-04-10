@extends('layouts.app')

@section('page_title', 'Draft Berita')

@section('content')
<div class="px-6 pb-5 flex justify-between items-center">
    <div>
        <h1 class="text-xl font-bold text-gray-800 dark:text-white">Draft Berita</h1>
        <p class="text-sm text-gray-500 dark:text-gray-400">Daftar tulisan yang belum diterbitkan ke publik.</p>
    </div>
    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-bold">
        Total: {{ $draft_news->count() }} Draft
    </span>
</div>
<div class="bg-white dark:bg-[#191a1b] border border-gray-400 dark:border-black max-h-192.75 rounded-md overflow-y-auto [&::-webkit-scrollbar]:w-3 [&::-webkit-scrollbar-track]:bg-gray-300 [&::-webkit-scrollbar-track]:rounded-r-md [&::-webkit-scrollbar-thumb]:bg-gray-400 [&::-webkit-scrollbar-thumb]:rounded-r-md">
    <table class="w-full text-left">
        <thead class="sticky top-0 bg-gray-200 dark:bg-[#141415] border-b border-gray-400 dark:border-black">
            <tr class="text-gray-800 dark:text-white">
                <th class="p-4 text-sm font-semibold">Judul Berita</th>
                <th class="p-4 text-sm font-semibold">Penulis</th>
                <th class="p-4 text-sm font-semibold">Kategori</th>
                <th class="p-4 text-sm font-semibold">Terakhir Diubah</th>
                <th class="p-4 text-sm font-semibold text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-400 dark:divide-black">
            @forelse($draft_news as $news)
            <tr class="hover:bg-gray-400 dark:hover:bg-gray-600 text-gray-800 dark:text-white transition">
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
                <td class="p-4 text-sm text-gray-500">
                    {{ $news->updated_at->diffForHumans() }}
                </td>
                <td class="p-4">
                    <div class="flex justify-center gap-3">
                        <a href="{{ route('news.edit', [$news->id, 'from' => 'drafts']) }}" class="border border-gray-300 hover:bg-gray-300 dark:hover:text-black px-4 py-1 rounded-lg text-xs font-bold transition duration-400">
                            Edit
                        </a>
                        <form id="publish-form-{{ $news->id }}" action="{{ route('news.publish', $news->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="button" onclick="validatePublish({{ $news->id }}, @js($news->title), @js($news->author), @js($news->content))"
                                    class="bg-blue-600 text-white hover:bg-blue-700 px-4 py-1 rounded-lg text-xs font-bold shadow-sm transition duration-400">
                                Publish
                            </button>
                        </form>
                        <form action="{{ route('news.destroy', [$news->id, 'from' => 'drafts']) }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white hover:bg-red-700 px-4 py-1 rounded-lg text-xs font-bold shadow-sm transition duration-400">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="p-10 text-center text-gray-400 italic">
                    Tidak ada draft berita saat ini.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
