<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}" class="h-90">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div>
            <label for="email" :value="__('Email')" class="block text-white text-left">Email</label>
            <input readonly id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autocomplete="username"
                    class="cursor-not-allowed w-full py-2 px-3 rounded-md border bg-gray-300 dark:bg-[#343638] border-gray-600 dark:border-black focus:border-blue-500 outline-none">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <label for="password" :value="__('Password')" class="block text-white text-left">Kata Sandi Baru</label>
            <input id="password" type="password" name="password" required autocomplete="new-password"
                    class="w-full py-2 px-3 rounded-md border border-gray-600 dark:border-black focus:border-blue-500 outline-none">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
            <label for="password_confirmation" :value="__('Confirm Password')" class="block text-white text-left">Konfirmasi Kata Sandi Baru</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                    class="w-full py-2 px-3 rounded-md border border-gray-600 dark:border-black focus:border-blue-500 outline-none">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none transition ease-in-out duration-150">
                Reset Kata Sandi
            </button>
        </div>
    </form>
</x-guest-layout>
