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
            <div class="mx-auto overflow-hidden  sm:ml-64 w-full ">
                @include('layouts.navigationAdmin')
                <main class="p-4 mt-4">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>
    </div>
    <script>
        var sidebar = document.getElementById("sidebar");
        var toggleSidebar = document.getElementById("sidebar-toggle");
        var contentSidebar = document.getElementById("sidebar-content");
        var openClassList = ["bg-blue-600", "text-white", "right-0", "mt-16", "-mr-6", "rounded-tr-full", "rounded-br-full", "focus:outline-none", "focus:ring-2", "focus:ring-offset-2", "focus:ring-indigo-900"];
        var closeClassList = ["bg-white", "text-red-700", "right-8", "top-6", "rounded-full", "hover:bg-gray-200"];

        function sidebarToggle() {
            if (toggleSidebar.title == "Abrir menú") {
                sidebar.style.transform = "translateX(0px)";
                toggleSidebar.classList.remove(...openClassList);
                toggleSidebar.classList.add(...closeClassList);
                toggleSidebar.querySelector("svg path").setAttribute("d", "M6 18L18 6M6 6l12 12");
                contentSidebar.querySelectorAll('a').forEach(sidebarLink => sidebarLink.removeAttribute('tabindex'));
                contentSidebar.setAttribute("aria-hidden", false);
                toggleSidebar.setAttribute("aria-expanded", true);
                toggleSidebar.setAttribute("aria-label", toggleSidebar.title = "Cerrar menú");
            } else {
                sidebar.style.transform = "translateX(-260px)";
                toggleSidebar.classList.remove(...closeClassList);
                toggleSidebar.classList.add(...openClassList);
                toggleSidebar.querySelector("svg path").setAttribute("d", "M4 6h16M4 12h16M4 18h16");
                contentSidebar.querySelectorAll('a').forEach(sidebarLink => sidebarLink.setAttribute('tabindex', -1));
                contentSidebar.setAttribute("aria-hidden", true);
                toggleSidebar.setAttribute("aria-expanded", false);
                toggleSidebar.setAttribute("aria-label", toggleSidebar.title = "Abrir menú");
            }
        }
    </script>
</body>

</html>
