@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'cursor-not-allowed w-full py-2 px-3 rounded-md border bg-gray-300 dark:bg-[#343638] border-gray-600 dark:border-black focus:border-blue-500 outline-none']) }}>
