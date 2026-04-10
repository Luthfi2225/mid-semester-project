<aside id="sidebar" class="static flex flex-col w-64 bg-slate-200 dark:bg-[#191a1b] border-r border-gray-400 dark:border-black text-gray-800 dark:text-white min-h-screen px-2 pt-4 transition-all duration-300">
    <div class="flex items-center mb-6 gap-3 px-2">
        <button id="toggleSidebar" class="shrink-0 group flex flex-col items-center justify-center w-8 h-8 border border-gray-600 dark:border-white rounded-md hover:bg-gray-400 dark:hover:bg-gray-600 hover:border-gray-400 dark:hover:border-gray-600 transition-all duration-200">
            <span class="w-4 h-0.5 bg-gray-800 dark:bg-white transition-all duration-200 mb-1"></span>
            <span class="w-4 h-0.5 bg-gray-800 dark:bg-white transition-all duration-200 mb-1"></span>
            <span class="w-4 h-0.5 bg-gray-800 dark:bg-white transition-all duration-200"></span>
        </button>
        <div id="sidebarTitle" class="text-2xl font-bold whitespace-nowrap overflow-hidden transition-opacity duration-300">
            Admin Panel
        </div>
    </div>

    <div class="flex overflow-y-auto overflow-x-hidden scrollbar-hide">
        <nav class="w-59.5">
            <div class="mb-4">
                <div class="h-7 border-y-2 border-slate-400">
                    <p class="sidebarTextTitle absolute text-1xl text-slate-400 uppercase font-semibold pl-2 transition-all duration-300">Main</p>
                </div>
                <a href="{{ route('dashboard') }}" wire:navigate class="flex items-center rounded hover:bg-gray-400 dark:hover:bg-gray-600 h-10 mt-2 py-2 px-3 transition-color">
                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                    </svg>
                    <div class="sidebarText absolute pl-8 w-38 transition-opacity duration-300">Dashboard</div>
                </a>
            </div>
            <div class="mb-4">
                <div class="h-7 border-y-2 border-slate-400">
                    <p class="sidebarTextTitle absolute text-1xl text-slate-400 uppercase font-semibold pl-2 transition-all duration-300">Content Management</p>
                </div>
                <a href="{{ route('news.create') }}" wire:navigate class="flex items-center rounded hover:bg-gray-400 dark:hover:bg-gray-600 h-10 mt-2 py-2 px-3 transition-color">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>
                    <div class="sidebarText absolute pl-8 w-38 transition-opacity duration-300">Buat Berita</div>
                </a>
                <a href="{{ route('news.index') }}" wire:navigate class="flex items-center rounded hover:bg-gray-400 dark:hover:bg-gray-600 h-10 mt-2 py-2 px-3 transition-color">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75" />
                    </svg>
                    <div class="sidebarText absolute pl-8 w-38 transition-opacity duration-300">Daftar Berita</div>
                </a>
                <a href="{{ route('news.drafts') }}" wire:navigate class="flex justify-between items-center rounded hover:bg-gray-400 dark:hover:bg-gray-600 mt-2 h-10 py-2 px-3 transition-color">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <div class="sidebarText absolute truncate w-43 pl-8 transition-opacity duration-300">
                        <span>
                            Draft Berita
                        </span>
                    </div>
                    <div class="sidebarText justify-end transition-opacity duration-300">
                        @if($draftCount > 0)
                            <span class="bg-red-500 text-white text-[10px] px-2 py-1 rounded-full">{{ $draftCount > 99 ? '99+' :$draftCount }}</span>
                        @endif
                    </div>
                </a>
                <a href="{{ route('categories.index') }}" wire:navigate class="flex items-center rounded hover:bg-gray-400 dark:hover:bg-gray-600 mt-2 h-10 py-2 px-3 transition-color">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 0 1-1.125-1.125v-3.75ZM14.25 7.125c0-.621.504-1.125 1.125-1.125h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 0 1-1.125-1.125v-3.75ZM2.25 16.875c0-.621.504-1.125 1.125-1.125h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 0 1-1.125-1.125v-3.75ZM14.25 16.875c0-.621.504-1.125 1.125-1.125h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 0 1-1.125-1.125v-3.75Z" />
                    </svg>
                    <div class="sidebarText absolute pl-8 w-38 transition-opacity duration-300">Kategori</div>
                </a>
            </div>

            <div class="mb-4">
                <div class="h-7 border-y-2 border-slate-400">
                    <p class="sidebarTextTitle absolute text-1xl text-slate-400 uppercase font-semibold pl-2 transition-all duration-300">Interaction</p>
                </div>
                <a href="{{ route('news.comments') }}" wire:navigate class="flex items-center rounded hover:bg-gray-400 dark:hover:bg-gray-600 mt-2 h-10 py-2 px-3 transition-color">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12.375m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.023c.09-.457-.133-.915-.543-1.217C3.128 15.811 1.5 13.997 1.5 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z" />
                    </svg>
                    <div class="sidebarText absolute pl-8 w-38 transition-opacity duration-300">Komentar</div>
                </a>
                <a href="{{ route('users.index') }}" wire:navigate class="flex items-center rounded hover:bg-gray-400 dark:hover:bg-gray-600 mt-2 h-10 py-2 px-3 transition-color">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                    </svg>
                    <div class="sidebarText absolute pl-8 w-38 transition-opacity duration-300">Daftar Pengguna</div>
                </a>
            </div>
        </nav>
    </div>

    <div id="sidebarFooter" class="flex w-59.5 absolute bottom-10 left-2 border-t-2 border-slate-400 p-2 transition-all duration-300">

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="absolute top-2 left-0.75 p-1 w-10 h-10 rounded text-red-500 hover:bg-red-500 hover:text-white transition-all duration-300">
                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                </svg>
            </button>
        </form>

        <a href="{{ route('profile.show') }}" wire:navigate id="profileButton" class="absolute top-2 left-24.5 p-1 w-10 h-10 rounded text-gray-700 dark:text-white hover:bg-gray-400 dark:hover:bg-gray-600 dark:hover:text-white transition-all duration-300">
            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z">
            </svg>
        </a>

        <a href="/setting" wire:navigate id="settingButton" class="absolute top-2 left-48.25 p-1 w-10 h-10 rounded text-gray-700 dark:text-white hover:bg-gray-400 dark:hover:bg-gray-600 dark:hover:text-white transition-all duration-300">
            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z">
            </svg>
        </a>

    </div>
</aside>
