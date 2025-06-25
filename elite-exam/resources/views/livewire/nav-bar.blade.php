<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Elite Exam</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul
                class="relative font-medium flex flex-col mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:items-center md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="{{ route('artists') }}"
                        class="block py-2 px-3 rounded-sm md:p-0
            {{ request()->routeIs('top-artist') ? 'text-white bg-blue-700 md:bg-transparent md:text-blue-700 dark:text-white md:dark:text-blue-500' : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent' }}"
                        aria-current="{{ request()->routeIs('artists') ? 'page' : '' }}">
                        Artists
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="block py-2 px-3 rounded-sm md:p-0
            {{ request()->routeIs('dashboard') ? 'text-white bg-blue-700 md:bg-transparent md:text-blue-700 dark:text-white md:dark:text-blue-500' : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent' }}"
                        aria-current="{{ request()->routeIs('dashboard') ? 'page' : '' }}">
                        Albums
                    </a>
                </li>
                <li>
                    <a href="{{ route('albums') }}"
                        class="block py-2 px-3 rounded-sm md:p-0
            {{ request()->routeIs('albums') ? 'text-white bg-blue-700 md:bg-transparent md:text-blue-700 dark:text-white md:dark:text-blue-500' : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent' }}"
                        aria-current="{{ request()->routeIs('albums') ? 'page' : '' }}">
                        Albums Sold
                    </a>
                </li>

                <li>
                    <a href="{{ route('combined-albums') }}"
                        class="block py-2 px-3 rounded-sm md:p-0
            {{ request()->routeIs('combined-albums') ? 'text-white bg-blue-700 md:bg-transparent md:text-blue-700 dark:text-white md:dark:text-blue-500' : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent' }}"
                        aria-current="{{ request()->routeIs('combined-albums') ? 'page' : '' }}">
                        Combined Albums Sold
                    </a>
                </li>                
                <li>
                    <a href="{{ route('top-artist') }}"
                        class="block py-2 px-3 rounded-sm md:p-0
            {{ request()->routeIs('top-artist') ? 'text-white bg-blue-700 md:bg-transparent md:text-blue-700 dark:text-white md:dark:text-blue-500' : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent' }}"
                        aria-current="{{ request()->routeIs('top-artist') ? 'page' : '' }}">
                        Top Artist
                    </a>
                </li>
                <li x-data="{ openLogout: false }">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-8 h-8 flex items-center justify-center rounded-full bg-white border border-gray-300 shadow-sm hover:cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-log-out-icon lucide-log-out">
                                <path d="m16 17 5-5-5-5" />
                                <path d="M21 12H9" />
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                            </svg>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>