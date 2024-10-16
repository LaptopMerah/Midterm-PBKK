<nav
    class="bg-white dark:bg-gray-900 sticky w-full z-99 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

    <button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar" aria-controls="sidebar-multi-level-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
    </button>
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <span
                class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"><strong>S</strong>i<strong>A</strong>sdos<strong>P</strong>adu</span>
        </a>
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            @auth
                <a href="/dashboard">
                    <x-button type='alternative' addClass="hidden md:block">Dashboard</x-button>
                </a>
            @else
                <a href="/login">
                    <x-button type='alternative' addClass="hidden md:block">Login</x-button>
                </a>
            @endauth

        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul
                class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <x-nav-links href="/" :active="request()->is('/')">Homepage</x-nav-links>
                <x-nav-links href="/class-list" :active="request()->is('class-list')">Class List</x-nav-links>
                <x-nav-links href="/student/teaching-assistant-registration" :active="request()->is('ta-registration')">Assistant Registration</x-nav-links>
                <x-button type='alternative' addClass="block md:hidden">Login</x-button>
            </ul>
        </div>
    </div>
</nav>
