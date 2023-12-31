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
            <!-- Contact Form and Statistics Cards -->
            <div class="mt-8 mx-4 grid grid-cols-1 md:grid-cols-2">
                <!-- Contact Form -->
                <div class="p-6 mr-2 bg-gray-100 dark:bg-gray-800 sm:rounded-lg">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4 flex flex-col justify-center items-center">Profile Mahasiswa</h2>
                    <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mx-auto">
                        <div class="flex flex-col items-center pb-10">
                            <img class="w-24 h-24 mb-3 mt-8 rounded-full shadow-lg"
                                src='https://media-sin6-2.cdn.whatsapp.net/v/t61.24694-24/408547088_723104809761384_7218053295329157033_n.jpg?ccb=11-4&amp;oh=01_AdTQfdEJFVsjvKaR4bw2K9iGWoWWaqta9LSePs2ku8pXEw&amp;oe=658E46ED&amp;_nc_sid=e6ed6c&amp;_nc_cat=108'
                            {{-- src="https://media.licdn.com/dms/image/D5603AQFtLDSHnI82vw/profile-displayphoto-shrink_400_400/0/1664614490501?e=1707350400&v=beta&t=QoxHL_mXvVb_gjZLGQMQd42fHn5ObdPsg_LztlFndC8" --}}
                                alt="Foto Profil" alt="Profile" />
                            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">
                                {{ auth()->user()->name }}
                            </h5>
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                {{ auth()->user()->id }}
                            </span>
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                {{ auth()->user()->email }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="p-6 ml-2 bg-gray-100 dark:bg-gray-800 sm:rounded-lg flex justify-center items-center">
                    <div class="tombol-semester">
                        @foreach ($semesters as $semester)
                            @php
                                $approvalClass = '';

                                // Check the condition for each approval type
                                if ($semester['hasApproval'] == 'irskhs') {
                                    $approvalClass = 'approved-irskhs';
                                } elseif ($semester['hasApproval'] == 'luluspkl') {
                                    $approvalClass = 'approved-luluspkl';
                                } elseif ($semester['hasApproval'] == 'lulusskripsi') {
                                    $approvalClass = 'approved-lulusskripsi';
                                } else {
                                    $approvalClass = 'not-approved';
                                }
                            @endphp

                            <a href="{{ route('progres.semester', ['nim' => $mahasiswa->nim, 'smt' => $semester['smt']]) }}"
                                class="semester-button {{ $approvalClass }} hover:underline">
                                {{ $semester['smt'] }}
                            </a>
                        @endforeach
                    </div>

                    {{-- <div class="mt-4 mr-10 p-4 border-dashed border-2 rounded-lg">
                    <div class="position-fixed flex w-full border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700"> --}}
                    {{-- <div class="flex justify-center w-full gap-2 border-dashed border-gray-500">
                            <a href="#" class="nav-link-verifikasi" data-name="irs" data-smt="{{ $semester['smt'] }}">
                                <button
                                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">IRS</button>
                            </a>
                            <a href="#" class="nav-link-verifikasi" data-name="khs" data-smt="{{ $semester['smt'] }}">
                                <button
                                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">KHS</button>
                            </a>
                            <a href="#" class="nav-link-verifikasi" data-name="pkl" data-smt="{{ $semester['smt'] }}">
                                <button
                                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">PKL</button>
                            </a>
                            <a href="#" class="nav-link-verifikasi" data-name="skripsi" data-smt="{{ $semester['smt'] }}">
                                <button
                                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">Skripsi</button>
                            </a>

                        </div> --}}
                    <div class="isi-konten">
                        @yield('view-progress')
                    </div>
                </div>
            </div>
        </div>
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
