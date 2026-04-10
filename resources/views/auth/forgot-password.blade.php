<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Lupa kata sandi Anda? Tidak masalah. Cukup beri tahu kami alamat email Anda dan kami akan mengirimkan tautan pengaturan ulang kata sandi melalui email yang memungkinkan Anda memilih kata sandi baru.') }}
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <a href="{{ route('welcome') }}" wire:navigate class="absolute top-70 left-180 text-sm text-gray-500 hover:text-blue-600 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Kembali
    </a>

    <form method="POST" action="{{ route('password.email') }}" class="h-45">
        @csrf

        <div>
            <label for="email" :value="__('Email')" class="block text-white text-left">Email</label>
            <input id="email" type="email" name="email" :value="old('email')" required placeholder="Masukkan email anda"
                    class="w-full py-2 px-3 rounded-md border border-gray-600 dark:border-black focus:border-blue-500 outline-none">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
