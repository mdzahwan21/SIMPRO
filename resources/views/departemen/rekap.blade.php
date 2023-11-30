@extends('departemen.navbar')

@section('content')
    <div class="w-full p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="p-4 flex justify-center w-full gap-2 items-center md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul
                    class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="/rekap-progress/status"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            REKAP STATUS</a>
                    </li>
                    <li>
                        <a href="/rekap-progress/pkl"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            REKAP PKL</a>
                    </li>
                    <li>
                        <a href="/rekap-progress/skripsi"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            REKAP SKRIPSI</a>
                    </li>
                </ul>
            </div>

            <div class="flex flex-col">
                <div class="flex justify-between m-4">
                    <section class="search-bar translate-y-1/4">
                        @include('components.searchBar')
                    </section>
                    <section class="statusfilter">
                        @include('components.statusFilter')
                    </section>
                </div>
                <section class="rekap-list m-4">
                    @yield('tabel')
                </section>
            </div>
        </div>

    </div>
@endsection
