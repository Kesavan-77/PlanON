<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="//unpkg.com/alpinejs" defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<style>
    .active {
        background-color: #4A5568;
        color: #fff;
    }

    .active:hover{
        background-color: #4A5568;
        color: #fff;
    }
</style>


<body class="font-sans antialiased dark:bg-gray-900" x-data="{ sidebarOpen: false }">

    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button @click="sidebarOpen = !sidebarOpen" aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                    <a href="/" class="flex ms-2 md:me-24">
                        <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 me-3" alt="PlanON Logo" />
                        <span
                            class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">PlanON</span>
                    </a>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center ms-3">
                        <button type="button"
                            class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                            aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                        </button>
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                            id="dropdown-user">
                            <!-- User dropdown menu items -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <aside x-bind:class="{ '-translate-x-full': !sidebarOpen }" id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{route('vehicle.index')}}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 active group">
                        <i class="fa fa-car" aria-hidden="true"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">All Vehicle</span>
                         </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i class="fa fa-id-card-o" aria-hidden="true"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">All drivers</span>
                         </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i class="fa fa-cogs" aria-hidden="true"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Edit Profile</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i class="fa fa-bell" aria-hidden="true"></i>                        
                        <span class="flex-1 ms-3 whitespace-nowrap">Notifications</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <div class="p-4 sm:ml-64 mt-5">
        {{ $slot }}
    </div>

</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const navLinks = document.querySelectorAll('aside ul li a');
        navLinks.forEach(link => {
            link.addEventListener('click', function () {
                navLinks.forEach(item => item.classList.remove('active'));
                this.classList.add('active');
            });
        });
    });
</script>

</html>