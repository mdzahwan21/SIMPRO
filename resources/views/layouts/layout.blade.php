@extends('layouts.main')

@section('body')
    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="px-3 py-3 lg:px-5 lg:pl-3 flex items-center justify-between">
            <div class="flex items-center justify-start">
                @include('layouts.headerLeft')
            </div>

            <div class="flex items-center justify-end">
                @include('layouts.headerRight')
            </div>
        </div>
    </nav>

    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            @yield('nav-bar')
        </div>
    </aside>

    {{-- <div class="flex p-4 sm:ml-64 mt-14">
        @yield('content')
    </div> --}}
    <div class="flex sm:ml-64 mt-14">
        @yield('content')
    </div>

@endsection
