<form id="loginPage" method="POST" action="{{ route('login') }}" class="absolute w-84.5 top-88.5">
    @csrf

    <div>
        <label for="email" :value="__('Email')" class="dark:text-white">Email</label>
        <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Masukkan email"
                class="w-full py-2 px-3 rounded-md border border-gray-600 dark:border-black focus:border-blue-500 outline-none">
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div class="mt-4">
        <label for="password" :value="__('Password')" class="dark:text-white">Kata Sandi</label>
        <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Masukkan kata sandi"
                class="w-full py-2 px-3 rounded-md border border-gray-600 dark:border-black focus:border-blue-500 outline-none">

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <div class="block mt-4">

    </div>

    <div class="flex justify-between items-center mt-4">
        <label for="remember_me" class="inline-flex items-center">
            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Ingat saya') }}</span>
        </label>

        <x-primary-button class="ms-3">
            {{ __('Log in') }}
        </x-primary-button>
    </div>

    <div class="text-center mt-4">
        @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 dark:text-white hover:text-blue-600 rounded-md focus:outline-none" href="{{ route('password.request') }}">
                {{ __('Lupa kata sandi Anda?') }}
            </a>
        @endif
    </div>

    <div class="text-center mt-4">
        <span>
            Or
        </span>
    </div>

    <div class="text-center mt-4">
        <span class="text-sm text-gray-600 dark:text-white">Tidak punya akun?</span>
        <button type="button" onclick="registerPageOn()" class="cursor-pointer pl-1 underline text-sm text-blue-500 hover:text-blue-600 rounded-md focus:outline-none">
            Register
        </button>
    </div>
</form>
