@extends('operator.navbar')
@section('content')
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
<div class="w-full">
    <div class="flex flex-col gap-8 p-4">
        <div class="w-full flex justify-center items-center flex-col w-full p-4 border-2 border-black border-dashed rounded-lg">
            <h1 class="text-3xl font-semibold text-gray-900 mb-4">Profile Operator</h1>
            <br>
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="flex flex-col items-center p-4 m-8">
                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg" 
                    src='https://media.licdn.com/dms/image/C5603AQFg5fhHcCfs2g/profile-displayphoto-shrink_800_800/0/1658109361552?e=1706745600&v=beta&t=CeAb6STx8PaIMD9EgkbK-bEjywdv3c02BzU0hflACRA'
                    {{-- src='https://media.licdn.com/dms/image/D5603AQFtLDSHnI82vw/profile-displayphoto-shrink_400_400/0/1664614490501?e=1707350400&v=beta&t=QoxHL_mXvVb_gjZLGQMQd42fHn5ObdPsg_LztlFndC8'  --}}
                    alt ="Pofile-Picture"/>
                    {{-- src="{{ url('storage/foto/' . auth()->user()->name . '.jpg') }}" alt="Profile Pic" /> --}}
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ auth()->user()->name }}</h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">{{ auth()->user()->id }}</span>
                    <span class="text-sm text-gray-500 dark:text-gray-400">{{ auth()->user()->email }}</span>
                </div>
            </div>
            <br>
            <div class="flex flex-col md:flex-row gap-8 w-full p-4">
            <!-- Total Users -->
            <div class="w-full md:w-1/3 bg-blue-500 p-4 text-center rounded-lg">
                <p class="text-sm text-white">Total Users: {{ $totalUsers }}</p>
            </div>

            <!-- Total Mahasiswa -->
            <div class="w-full md:w-1/3 bg-green-500 p-4 text-center rounded-lg">
                <p class="text-sm text-white">Total Mahasiswa: {{ $totalMahasiswa }}</p>
            </div>

            <!-- Total Dosen -->
            <div class="w-full md:w-1/3 bg-red-500 p-4 text-center rounded-lg">
                <p class="text-sm text-white">Total Dosen: {{ $totalDosen }}</p>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection