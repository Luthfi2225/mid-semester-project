@extends('layouts.app')

@section('page_title', 'Komentar')

@section('content')
<div class="bg-white dark:bg-[#191a1b] border border-gray-400 dark:border-black h-209.75 rounded-md overflow-y-auto [&::-webkit-scrollbar]:w-3 [&::-webkit-scrollbar-track]:bg-gray-300 [&::-webkit-scrollbar-track]:rounded-r-xl [&::-webkit-scrollbar-thumb]:bg-gray-400 [&::-webkit-scrollbar-thumb]:rounded-r-xl">
    <div class="sticky top-0 bg-white dark:bg-[#141415] border-gray-400 dark:border-black p-6 border-b ">
        <h2 class="text-lg font-bold text-gray-800 dark:text-white">Moderasi Komentar</h2>
        <p class="text-sm text-gray-500 dark:text-white">Kelola komentar yang masuk di berita Anda.</p>
    </div>

    <div class="divide-y divide-gray-400 dark:divide-black">
        @forelse($comments as $comment)
        <div class="p-6 hover:bg-gray-400 dark:hover:bg-gray-600 transition">
            <div class="flex justify-between items-start mb-2">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold">
                        {{ substr($comment->name, 0, 1) }}
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-gray-800 dark:text-white">{{ $comment->user->name }}</h4>
                        <p class="text-xs text-gray-600 dark:text-white">Pada berita: <span class="italic text-blue-500">{{ $comment->news->title }}</span></p>
                    </div>
                </div>
                <span class="text-xs text-gray-700 dark:text-white">{{ $comment->created_at->diffForHumans() }}</span>
            </div>

            <p class="text-sm text-gray-600 dark:text-white ml-13 mb-4">
                "{{ $comment->comment }}"
            </p>

            <div class="flex justify-end gap-2 ml-13">
                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-600 text-white hover:bg-red-700 px-4 py-1 rounded-lg text-xs font-bold shadow-sm transition duration-400">
                        Hapus Komentar
                    </button>
                </form>
                @if(!$comment->is_approved)
                <form action="{{ route('comments.approve', $comment->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="bg-green-600 text-white hover:bg-green-700 px-4 py-1 rounded-lg text-xs font-bold shadow-sm transition duration-400">
                        Setujui
                    </button>
                </form>
                @endif
            </div>
        </div>
        @empty
        <div class="p-10 text-center text-gray-400 italic">Belum ada komentar baru.</div>
        @endforelse
    </div>
</div>
@endsection
