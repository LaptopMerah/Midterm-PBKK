<aside id="sidebar"
       class="fixed sm:relative top-0 left-0 z-20 w-64 min-h-screen transition-transform -translate-x-full sm:translate-x-0"
       aria-label="Sidebar">
    <div class="min-h-screen px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            @if(auth()->user()->user_type == \App\Enums\UserType::STUDENT)
                <li>
                    <a href="/student/teaching-assistant-registration"
                       class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white
                    {{ request()->is('student/teaching-assistant-registration*') ? 'bg-gray-300 hover:border hover:border-gray-300 dark:bg-gray-700' : '' }} hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg
                            class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="ms-3">Pendaftaran</span>
                    </a>
                </li>
            @elseif(auth()->user()->user_type == \App\Enums\UserType::LECTURER)

            @elseif(auth()->user()->user_type == \App\Enums\UserType::OPERATOR)
                <li>
                    <a href="/operator/user-management"
                       class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white
                    {{ request()->is('operator/user-management*') ? 'bg-gray-300 hover:border hover:border-gray-300 dark:bg-gray-700' : '' }} hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <x-feathericon-user />
                        <span class="ms-3">User Management</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</aside>
