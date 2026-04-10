
@extends('layouts.app')

@section('content')
<h2 class="pl-4 text-lg font-bold text-gray-800 dark:text-white mb-2">Statistik</h2>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-4.5">
    <div class="bg-white dark:bg-[#191a1b] border-2 border-gray-400 dark:border-black p-6 rounded-xl shadow-sm">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 dark:text-white font-medium">Total Berita</p>
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $totalNews }}</h3>
            </div>
            <div class="p-3 bg-blue-100 rounded-lg">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z" />
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-[#191a1b] border-2 border-gray-400 dark:border-black p-6 rounded-xl shadow-sm">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 dark:text-white font-medium">Dipublikasi</p>
                <h3 class="text-2xl font-bold text-green-600">{{ $publishedNews }}</h3>
            </div>
            <div class="p-3 bg-green-100 rounded-lg">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-[#191a1b] border-2 border-gray-400 dark:border-black p-6 rounded-xl shadow-sm">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 dark:text-white font-medium">Draft</p>
                <h3 class="text-2xl font-bold text-yellow-600">{{ $draftNews }}</h3>
            </div>
            <div class="p-3 bg-yellow-100 rounded-lg">
                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-[#191a1b] border-2 border-gray-400 dark:border-black p-6 rounded-xl shadow-sm">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 dark:text-white font-medium">Kategori</p>
                <h3 class="text-2xl font-bold text-purple-600">{{ $totalCategories }}</h3>
            </div>
            <div class="p-3 bg-purple-100 rounded-lg">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 11h.01M7 15h.01M11 7h.01M11 11h.01M11 15h.01M15 7h.01M15 11h.01M15 15h.01M19 7h.01M19 11h.01M19 15h.01M7 3h10a2 2 0 012 2v14a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z" />
                </svg>
            </div>
        </div>
    </div>
</div>

<h2 class="pl-4 text-lg font-bold text-gray-800 dark:text-white mb-2">Aktivitas Terakhir</h2>
<div class="bg-white dark:bg-[#191a1b] border-2 border-gray-400 dark:border-black rounded-xl mb-4.5 shadow-sm overflow-hidden">
    <div class="p-6 bg-gray-200 dark:bg-[#141415] border-b border-gray-400 dark:border-black flex justify-between items-center">
        <h2 class="text-lg font-bold text-gray-800 dark:text-white">Berita Terbaru</h2>
        <a href="{{ route('news.index') }}" class="text-sm text-blue-600 hover:underline">Lihat Semua</a>
    </div>
    <div class="h-97.5 overflow-x-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-track]:bg-gray-300 [&::-webkit-scrollbar-thumb]:bg-gray-400 [&::-webkit-scrollbar-thumb]:rounded-md">
        <table class="w-full text-left">
            <thead class="sticky top-0 bg-gray-200 dark:bg-[#141415] border-b border-gray-400 dark:border-black text-gray-600 dark:text-white text-xs uppercase">
                <tr>
                    <th class="p-4 font-semibold">Judul</th>
                    <th class="p-4 font-semibold">Status</th>
                    <th class="p-4 font-semibold text-right">Tanggal</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-400 dark:divide-black">
                @foreach($recentNews as $news)
                <tr class="hover:bg-gray-400 dark:hover:bg-gray-600 dark:hover:[] transition duration-400">
                    <td class="p-4">
                        <div class="text-sm font-medium text-gray-800 dark:text-white truncate max-w-xs md:max-w-md">
                            {{ $news->title ?: '(Tanpa Judul)' }}
                        </div>
                    </td>
                    <td class="p-4">
                        @if($news->published_at)
                            <span class="px-2 py-1 text-[10px] font-bold bg-green-100 text-green-700 rounded-full uppercase">Published</span>
                        @else
                            <span class="px-2 py-1 text-[10px] font-bold bg-yellow-100 text-yellow-700 rounded-full uppercase">Draft</span>
                        @endif
                    </td>
                    <td class="p-4 text-sm text-gray-500 dark:text-white text-right">
                        {{ $news->created_at->format('d M Y') }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<h2 class="pl-4 text-lg font-bold text-gray-800 dark:text-white mb-2">Aksi Cepat</h2>
<div class="grid grid-cols-2 md:grid-cols-4 gap-4">

    <a href="{{ route('news.create') }}"
        class="group flex flex-col items-center justify-center p-4 bg-blue-600 border-2 border-gray-400 dark:border-black hover:bg-blue-700 hover:border-blue-700 rounded-xl transition-all duration-400 shadow-md hover:shadow-blue-500/20">
        <div class="p-3 bg-white/20 rounded-full mb-3 group-hover:scale-110 transition-transform">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
        </div>
        <span class="text-sm font-bold text-white">Tulis Berita</span>
    </a>

    <a href="{{ route('categories.index') }}"
        class="group flex flex-col items-center justify-center p-4 bg-white dark:bg-[#191a1b] border-2 border-gray-400 dark:border-black rounded-xl hover:border-purple-500 transition-all duration-400 shadow-sm">
        <div class="p-3 bg-purple-100 rounded-full mb-3 group-hover:rotate-12 transition-transform">
            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 11h.01M7 15h.01M11 7h.01M11 11h.01M11 15h.01M15 7h.01M15 11h.01M15 15h.01M19 7h.01M19 11h.01M19 15h.01M7 3h10a2 2 0 012 2v14a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z" />
            </svg>
        </div>
        <span class="text-sm font-bold text-gray-700">Kategori</span>
    </a>

    <a href="{{ route('news.drafts') }}"
        class="group flex flex-col items-center justify-center p-4 bg-white dark:bg-[#191a1b] border-2 border-gray-400 dark:border-black rounded-xl hover:border-yellow-500 transition-all duration-400 shadow-sm">
        <div class="p-3 bg-yellow-100 rounded-full mb-3 group-hover:scale-110 transition-transform">
            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
        </div>
        <span class="text-sm font-bold text-gray-700">Lihat Draft</span>
    </a>

    <a href="/" target="_blank"
        class="group flex flex-col items-center justify-center p-4 bg-white dark:bg-[#191a1b] border-2 border-gray-400 dark:border-black rounded-xl hover:border-green-500 transition-all duration-400 shadow-sm">
        <div class="p-3 bg-green-100 rounded-full mb-3 group-hover:-translate-y-1 transition-transform">
            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
            </svg>
        </div>
        <span class="text-sm font-bold text-gray-700">Lihat Web</span>
    </a>

</div>
@endsection
