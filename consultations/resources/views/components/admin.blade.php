<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <div class="flex">
            <x-SideBarAdmin />
            <div class="mx-auto overflow-hidden  w-full ">
                @include('layouts.navigation')
                <main class="p-4 mt-4">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>
    </div>
    <script>
        var sideBar = document.getElementById("mobile-nav");
        var openSidebar = document.getElementById("openSideBar");
        var closeSidebar = document.getElementById("closeSideBar");
        sideBar.style.transform = "translateX(-260px)";

        function sidebarHandler(flag) {
            if (flag) {
                sideBar.style.transform = "translateX(0px)";
                openSidebar.classList.add("hidden");
                closeSidebar.classList.remove("hidden");
            } else {
                sideBar.style.transform = "translateX(-260px)";
                closeSidebar.classList.add("hidden");
                openSidebar.classList.remove("hidden");
            }
        }
    </script>
</body>

</html>
