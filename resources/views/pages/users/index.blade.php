@extends('layouts.app')

@section('page_title', 'Daftar Pengguna')

@section('content')
<div class="bg-white dark:bg-[#191a1b] border border-gray-400 dark:border-black h-209.75 rounded-md overflow-hidden">
    <div class="p-6 bg-gray-200 dark:bg-[#141415] border-b border-gray-400 dark:border-black flex justify-between items-center">
        <div>
            <h2 class="text-lg font-bold text-gray-800 dark:text-white">Manajemen User</h2>
            <p class="text-sm text-gray-500 dark:text-white">Total {{ $users->count() }} pengguna terdaftar.</p>
        </div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-blue-700 transition">
            + Tambah User
        </button>
    </div>

    <div class="h-184.75 overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-track]:rounded-br-md [&::-webkit-scrollbar-track]:bg-gray-300 [&::-webkit-scrollbar-thumb]:bg-gray-400 [&::-webkit-scrollbar-thumb]:rounded-md">
        <table class="w-full text-left">
            <thead class="sticky top-0 bg-gray-200 dark:bg-[#141415] border-b border-gray-400 dark:border-black text-xs uppercase">
                <tr class="text-gray-800 dark:text-white">
                    <th class="p-4 font-semibold">Nama & Email</th>
                    <th class="p-4 font-semibold">Role</th>
                    <th class="p-4 font-semibold text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-400 dark:divide-black">
                @foreach($users as $user)
                <tr class="hover:bg-gray-400 dark:hover:bg-gray-600 text-gray-800 dark:text-white transition">
                    <td class="p-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-gray-200 dark:bg-[#141415] flex items-center justify-center text-xs font-bold text-gray-600 dark:text-white">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            <div>
                                <div class="text-sm font-bold text-gray-800 dark:text-white">{{ $user->name }}</div>
                                <div class="text-xs text-gray-500 dark:text-white">{{ $user->email }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="p-4">
                        <form action="{{ route('users.updateRole', $user->id) }}" method="POST" class="flex items-center gap-2">
                            @csrf
                            @method('PATCH')
                            <select name="role" onchange="this.form.submit()"
                                class="bg-gray-200 dark:bg-[#141415] border border-gray-400 dark:border-black text-gray-700 dark:text-white text-[10px] font-bold uppercase rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1">
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="author" {{ $user->role == 'author' ? 'selected' : '' }}>Author</option>
                                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                            </select>
                        </form>
                    </td>
                    <td class="p-4 text-right">
                        <div class="flex justify-end gap-2 text-gray-600 dark:text-white">
                            <button class="hover:text-blue-600 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
                            </button>
                            <button class="hover:text-red-600 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
