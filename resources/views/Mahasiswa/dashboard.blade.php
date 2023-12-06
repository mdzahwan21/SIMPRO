@extends('Mahasiswa.navbar')

@section('content')
    <div class="w-full p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <!-- <p class="text-sm font-large text-gray-900 truncate dark:text-gray-300" role="none">
            Welcome, {{ auth()->user()->name }}!
        </p> -->
    <div class="w-full p-4 space-y-2">
        <!-- component -->
        <style>
            /* Compiled dark classes from Tailwind */
            .dark .dark\:divide-gray-700> :not([hidden])~ :not([hidden]) {
                border-color: rgba(55, 65, 81);
            }

            .dark .dark\:bg-gray-50 {
                background-color: rgba(249, 250, 251);
            }

            .dark .dark\:bg-gray-100 {
                background-color: rgba(243, 244, 246);
            }

            .dark .dark\:bg-gray-600 {
                background-color: rgba(75, 85, 99);
            }

            .dark .dark\:bg-gray-700 {
                background-color: rgba(55, 65, 81);
            }

            .dark .dark\:bg-gray-800 {
                background-color: rgba(31, 41, 55);
            }

            .dark .dark\:bg-gray-900 {
                background-color: rgba(17, 24, 39);
            }

            .dark .dark\:bg-red-700 {
                background-color: rgba(185, 28, 28);
            }

            .dark .dark\:bg-green-700 {
                background-color: rgba(4, 120, 87);
            }

            .dark .dark\:hover\:bg-gray-200:hover {
                background-color: rgba(229, 231, 235);
            }

            .dark .dark\:hover\:bg-gray-600:hover {
                background-color: rgba(75, 85, 99);
            }

            .dark .dark\:hover\:bg-gray-700:hover {
                background-color: rgba(55, 65, 81);
            }

            .dark .dark\:hover\:bg-gray-900:hover {
                background-color: rgba(17, 24, 39);
            }

            .dark .dark\:border-gray-100 {
                border-color: rgba(243, 244, 246);
            }

            .dark .dark\:border-gray-400 {
                border-color: rgba(156, 163, 175);
            }

            .dark .dark\:border-gray-500 {
                border-color: rgba(107, 114, 128);
            }

            .dark .dark\:border-gray-600 {
                border-color: rgba(75, 85, 99);
            }

            .dark .dark\:border-gray-700 {
                border-color: rgba(55, 65, 81);
            }

            .dark .dark\:border-gray-900 {
                border-color: rgba(17, 24, 39);
            }

            .dark .dark\:hover\:border-gray-800:hover {
                border-color: rgba(31, 41, 55);
            }

            .dark .dark\:text-white {
                color: rgba(255, 255, 255);
            }

            .dark .dark\:text-gray-50 {
                color: rgba(249, 250, 251);
            }

            .dark .dark\:text-gray-100 {
                color: rgba(243, 244, 246);
            }

            .dark .dark\:text-gray-200 {
                color: rgba(229, 231, 235);
            }

            .dark .dark\:text-gray-400 {
                color: rgba(156, 163, 175);
            }

            .dark .dark\:text-gray-500 {
                color: rgba(107, 114, 128);
            }

            .dark .dark\:text-gray-700 {
                color: rgba(55, 65, 81);
            }

            .dark .dark\:text-gray-800 {
                color: rgba(31, 41, 55);
            }

            .dark .dark\:text-red-100 {
                color: rgba(254, 226, 226);
            }

            .dark .dark\:text-green-100 {
                color: rgba(209, 250, 229);
            }

            .dark .dark\:text-blue-400 {
                color: rgba(96, 165, 250);
            }

            .dark .group:hover .dark\:group-hover\:text-gray-500 {
                color: rgba(107, 114, 128);
            }

            .dark .group:focus .dark\:group-focus\:text-gray-700 {
                color: rgba(55, 65, 81);
            }

            .dark .dark\:hover\:text-gray-100:hover {
                color: rgba(243, 244, 246);
            }

            .dark .dark\:hover\:text-blue-500:hover {
                color: rgba(59, 130, 246);
            }

            /* Custom style */
            .header-right {
                width: calc(100% - 3.5rem);
            }

            .sidebar:hover {
                width: 16rem;
            }

            @media only screen and (min-width: 768px) {
                .header-right {
                    width: calc(100% - 16rem);
                }
            }
        </style>
        {{-- <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white"> --}}

        {{-- <div class="h-full ml-14 mt-14 mb-10 md:ml-64"> --}}
        <!-- Contact Form -->
        <div class="mt-8 mx-4">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="p-6 mr-2 bg-gray-100 dark:bg-gray-800 sm:rounded-lg">
                    <div
                        class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex justify-end px-4 pt-4">
                            <button id="dropdownButton" data-dropdown-toggle="dropdown"
                                class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                                type="button"> 
                            </button>
                        </div>

                        <div class="flex flex-col items-center pb-10">
                            <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ url('storage/foto/' . auth()->user()->name . '.jpg') }}" alt="Foto Profil" alt="Profile" />
                            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">
                                {{ auth()->user()->name }}
                            </h5>
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                {{ auth()->user()->id}}
                            </span>
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                {{ auth()->user()->email }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./Contact Form -->

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-10 p-4 gap-2">
            <div 
                class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-2 border-b-2 border-blue-600 dark:border-gray-600 text-white font-medium group w-20">
                <div class="text-right">
                    <p>1</p>
                </div>
            </div>

            <div
                class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group w-20">
                <div class="text-right">
                    <p>2</p>
                </div>
            </div>

            <div
                class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group w-20">
                <div class="text-right">
                    <p>3</p>
                </div>
            </div>

            <div
                class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group w-20">
                <div class="text-right">
                    <p>4</p>
                </div>
            </div>

            <div
                class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group w-20">
                <div class="text-right">
                    <p>5</p>
                </div>
            </div>

            <div
                class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group w-20">
                <div class="text-right">
                    <p>6</p>
                </div>
            </div>

            <div
                class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group w-20">
                <div class="text-right">
                    <p>7</p>
                </div>
            </div>

            <div
                class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group w-20">
                <div class="text-right">
                    <p>8</p>
                </div>
            </div>

            <div
                class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group w-20">
                <div class="text-right">
                    <p>9</p>
                </div>
            </div>

            <div
                class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group w-20">
                <div class="text-right">
                    <p>10</p>
                </div>
            </div>

            <div
                class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group w-20">
                <div class="text-right">
                    <p>11</p>
                </div>
            </div>

            <div
                class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group w-20">
                <div class="text-right">
                    <p>12</p>
                </div>
            </div>

            <div
                class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group w-20">
                <div class="text-right">

                    <p>13</p>
                </div>
            </div>
            
            <div
                class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group w-20">
                <div class="text-right">
                    <p>14</p>
                </div>
            </div>
        </div>
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
    <script>
        const setup = () => {
            const getTheme = () => {
                if (window.localStorage.getItem('dark')) {
                    return JSON.parse(window.localStorage.getItem('dark'))
                }
                return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
            }

            const setTheme = (value) => {
                window.localStorage.setItem('dark', value)
            }

            return {
                loading: true,
                isDark: getTheme(),
                toggleTheme() {
                    this.isDark = !this.isDark
                    setTheme(this.isDark)
                },
            }
        }
    </script>

    </div>
@endsection
