@extends('doswal.navbar')

@section('content')
    <div class="w-full p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
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
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-md">
                <!-- Profile Departemen -->
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Profile Dosen Wali</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-gray-100 dark:bg-gray-800 rounded-lg shadow-md p-6">
                        <img class="w-24 h-24 mb-3 rounded-full shadow-lg mx-auto"
                            src='https://media.licdn.com/dms/image/C5603AQFg5fhHcCfs2g/profile-displayphoto-shrink_800_800/0/1658109361552?e=1706745600&v=beta&t=CeAb6STx8PaIMD9EgkbK-bEjywdv3c02BzU0hflACRA'
                            alt="Bonnie image" />

                        <h5 class="text-xl font-medium text-gray-900 dark:text-white text-center">
                            {{ auth()->user()->name }}
                        </h5>
                        <p class="text-sm text-gray-500 dark:text-gray-400 text-center">
                            {{ optional(auth()->user()->mahasiswa)->nim }}
                        </p>
                        <p class="text-sm text-gray-500 dark:text-gray-400 text-center">
                            {{ auth()->user()->email }}
                        </p>
                    </div>
                    <!-- Tambahkan informasi lain di sini -->
                </div>
            </div>

            <!-- Card baru di bawah Profile Departemen -->
            <div class="bg-gray-100 dark:bg-gray-800 rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4"><center>Monitoring Progres Studi Mahasiswa Perwalian</center></h2>
                <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-md mt-6 md:mt-0">
                    <p>Lulus PKL : 940 </p>
                </div>
                <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-md mt-6 md:mt-10">
                    <p>Lulus Skripsi : 565 </p>
                </div>
            </div>

        </div>
        <!-- Statistik Mahasiswa -->
        <div class="mt-8 mx-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Buat kartu untuk setiap statistik -->
            <div
                class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium">
                <p class="text-center">Aktif : 1250</p>
                <!-- ... (jumlah mahasiswa aktif) ... -->
            </div>
            <div
                class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium">
                <p class="text-center">Cuti : 56</p>
            </div>
            <div
                class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium">
                <p class="text-center">Mangkir : 25</p>
            </div>
            <div
                class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium">
                <p class="text-center">Undur Diri : 64</p>
            </div>
            <div
                class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium">
                <p class="text-center">Meninggal Dunia : 12</p>
            </div>
            <div
                class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium">
                <p class="text-center">Drop Out : 21</p>
            </div>
            <div
                class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium">
                <p class="text-center">Lulus : 999</p>
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
