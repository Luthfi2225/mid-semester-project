@extends('layouts.app')

@section('page_title', 'Akun')

@section('content')
<div class="min-h-screen bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-white p-6 lg:p-8 flex flex-col items-center">

    <div class="max-w-2xl w-full bg-white dark:bg-[#161615] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-lg p-8">

        <div class="flex items-center justify-between mb-8">
            <h2 class="text-xl font-semibold">Informasi Profil</h2>
            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-500 hover:underline">Kembali</a>
        </div>

        <div class="space-y-6">
            <div>
                <label class="block text-xs uppercase tracking-widest text-gray-500 mb-1">Nama Lengkap</label>
                <p class="text-lg font-medium">{{ auth()->user()->name }}</p>
            </div>

            <div>
                <label class="block text-xs uppercase tracking-widest text-gray-500 mb-1">Alamat Email</label>
                <p class="text-lg font-medium">{{ auth()->user()->email }}</p>
            </div>

            <div>
                <label class="block text-xs uppercase tracking-widest text-gray-500 mb-1">Akun Dibuat Pada</label>
                <p class="text-lg font-medium">
                    {{ auth()->user()->created_at->format('d F Y') }}
                    <span class="text-sm text-gray-400 font-normal">({{ auth()->user()->created_at->diffForHumans() }})</span>
                </p>
            </div>
        </div>

        <hr class="my-8 border-gray-100 dark:border-[#2a2a2a]">

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="cursor-pointer text-red-500 hover:text-red-700 text-sm font-semibold uppercase tracking-widest">
                Keluar dari Akun
            </button>
        </form>
    </div>
</div>
@endsection
