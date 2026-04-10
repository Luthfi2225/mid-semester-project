<form id="registerPage" method="POST" action="{{ route('register') }}" class="absolute w-84.5 top-84.5 invisible">
    @csrf

    <div>
        <label for="name" :value="__('Name')" class="dark:text-white">Nama</label>
        <input id="name" type="text" name="name" :value="old('name')" required autocomplete="name" placeholder="Masukkan nama lengkap"
                class="w-full py-2 px-3 rounded-md border border-gray-600 dark:border-black focus:border-blue-500 outline-none">
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <div class="mt-4">
        <label for="email" :value="__('Email')" class="dark:text-white">Email</label>
        <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Masukkan alamat email"
                class="w-full py-2 px-3 rounded-md border border-gray-600 dark:border-black focus:border-blue-500 outline-none">
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div class="mt-4">
        <label for="password" :value="__('Password')" class="dark:text-white">Password</label>
        <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Masukkan password"
                class="w-full py-2 px-3 rounded-md border border-gray-600 dark:border-black focus:border-blue-500 outline-none">
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <div class="mt-4">
        <label for="password_confirmation" :value="__('Confirm Password')" class="dark:text-white">Konfirmasi Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi password"
                class="w-full py-2 px-3 rounded-md border border-gray-600 dark:border-black focus:border-blue-500 outline-none">
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <div class="flex items-center justify-end mt-4">
        <button type="button" onclick="loginPageOn()" class="cursor-pointer underline text-sm text-gray-600 dark:text-white hover:text-blue-600 rounded-md focus:outline-none">
            {{ __('Sudah terdaftar?') }}
        </button>

        <x-primary-button class="ms-4">
            {{ __('Register') }}
        </x-primary-button>
    </div>
</form>
