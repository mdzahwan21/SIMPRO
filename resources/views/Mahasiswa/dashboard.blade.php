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
                                <span class="sr-only">Open dropdown</span>
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 16 3">
                                    <path
                                        d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdown"
                                class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2" aria-labelledby="dropdownButton">
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Export
                                            Data</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="flex flex-col items-center pb-10">
                            <img class="w-24 h-24 mb-3 rounded-full shadow-lg"
                                src="/docs/images/people/profile-picture-3.jpg" alt="Bonnie image" />
                            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Nama</h5>
                            <span class="text-sm text-gray-500 dark:text-gray-400">NIM</span>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Email</span>
                            <div class="flex mt-4 md:mt-6">
                                <a href="#"
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                                    friend</a>
                                <a href="#"
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700 ms-3">Message</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./Contact Form -->

        <!-- Contact Form -->
        <div class="mt-8 mx-4">
            <div class="grid grid-cols-1 md:grid-cols-2">
              <div class="p-6 mr-2 bg-gray-100 dark:bg-gray-800 sm:rounded-lg">
                <h1 class="text-4xl sm:text-5xl~ text-gray-800 dark:text-white font-extrabold tracking-tight">Get in touch</h1>
                <p class="text-normal text-lg sm:text-2xl font-medium text-gray-600 dark:text-gray-400 mt-2">Fill in the form to submit any query</p>
      
                <div class="flex items-center mt-8 text-gray-600 dark:text-gray-400">
                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                  <div class="ml-4 text-md tracking-wide font-semibold w-40">Dhaka, Street, State, Postal Code</div>
                </div>
      
                <div class="flex items-center mt-4 text-gray-600 dark:text-gray-400">
                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                  </svg>
                  <div class="ml-4 text-md tracking-wide font-semibold w-40">+880 1234567890</div>
                </div>
      
                <div class="flex items-center mt-4 text-gray-600 dark:text-gray-400">
                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                  </svg>
                  <div class="ml-4 text-md tracking-wide font-semibold w-40">info@demo.com</div>
                </div>
              </div>
              <form class="p-6 flex flex-col justify-center">
                <div class="flex flex-col">
                  <label for="name" class="hidden">Full Name</label>
                  <input type="name" name="name" id="name" placeholder="Full Name" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none" />
                </div>
      
                <div class="flex flex-col mt-2">
                  <label for="email" class="hidden">Email</label>
                  <input type="email" name="email" id="email" placeholder="Email" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none" />
                </div>
      
                <div class="flex flex-col mt-2">
                  <label for="tel" class="hidden">Number</label>
                  <input type="tel" name="tel" id="tel" placeholder="Telephone Number" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none" />
                </div>
      
                <button type="submit" class="md:w-32 bg-blue-600 dark:bg-gray-100 text-white dark:text-gray-800 font-bold py-3 px-6 rounded-lg mt-4 hover:bg-blue-500 dark:hover:bg-gray-200 transition ease-in-out duration-300">Submit</button>
              </form>
            </div>
          </div>
          <!-- ./Contact Form -->

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 p-4 gap-2">
            <div 
                class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-2 border-b-2 border-blue-600 dark:border-gray-600 text-white font-medium group w-43">
                <div 
                    class="flex justify-center items-center w-10 h-10 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                </div>
                <div class="text-right">
                    <p>Semester 1</p>
                </div>
            </div>

            <div
                class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group w-43">
                <div
                    class="flex justify-center items-center w-10 h-10 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <p>Semester 2</p>
                </div>
            </div>

            <div
                class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group w-43">
                <div
                    class="flex justify-center items-center w-10 h-10 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <p>Semester 3</p>
                </div>
            </div>

            <div
                class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group w-43">
                <div
                    class="flex justify-center items-center w-10 h-10 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                </div>
                <div class="text-right">
                    <p>Semester 4</p>
                </div>
            </div>

            <div
                class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group w-43">
                <div
                    class="flex justify-center items-center w-10 h-10 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                </div>
                <div class="text-right">
                    <p>Semester 5</p>
                </div>
            </div>

            <div
                class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group w-43">
                <div
                    class="flex justify-center items-center w-10 h-10 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <p>Semester 6</p>
                </div>
            </div>

            <div
                class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group w-43">
                <div
                    class="flex justify-center items-center w-10 h-10 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <p>Semester 7</p>
                </div>
            </div>

            <div
                class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group w-43">
                <div
                    class="flex justify-center items-center w-10 h-10 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                </div>
                <div class="text-right">
                    <p>Semester 8</p>
                </div>
            </div>

            <div
                class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group w-43">
                <div
                    class="flex justify-center items-center w-10 h-10 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                </div>
                <div class="text-right">
                    <p>Semester 9</p>
                </div>
            </div>

            <div
                class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group w-43">
                <div
                    class="flex justify-center items-center w-10 h-10 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <p>Semester 10</p>
                </div>
            </div>

            <div
                class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group w-43">
                <div
                    class="flex justify-center items-center w-10 h-10 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <p>Semester 11</p>
                </div>
            </div>

            <div
                class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group w-43">
                <div
                    class="flex justify-center items-center w-10 h-10 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                </div>
                <div class="text-right">
                    <p>Semester 12</p>
                </div>
            </div>

            <div
                class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group w-43">
                <div
                    class="flex justify-center items-center w-10 h-10 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                </div>
                <div class="text-right">

                    <p>Semester 13</p>
                </div>
            </div>
            
            <div
                class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group w-43">
                <div
                    class="flex justify-center items-center w-10 h-10 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <p>Semester 14</p>
                </div>
            </div>
        </div>
        <!-- ./Statistics Cards -->

        <div class="grid grid-cols-1 lg:grid-cols-2 p-4 gap-4">

            <!-- Social Traffic -->
            <div
                class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
                <div class="rounded-t mb-0 px-0 border-0">
                    <div class="flex flex-wrap items-center px-4 py-2">
                        <div class="relative w-full max-w-full flex-grow flex-1">
                            <h3 class="font-semibold text-base text-gray-900 dark:text-gray-50">Social Traffic</h3>
                        </div>
                        <div class="relative w-full max-w-full flex-grow flex-1 text-right">
                            <button
                                class="bg-blue-500 dark:bg-gray-100 text-white active:bg-blue-600 dark:text-gray-800 dark:active:text-gray-700 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                type="button">See all</button>
                        </div>
                    </div>
                    <div class="block w-full overflow-x-auto">
                        <table class="items-center w-full bg-transparent border-collapse">
                            <thead>
                                <tr>
                                    <th
                                        class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Referral</th>
                                    <th
                                        class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Visitors</th>
                                    <th
                                        class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-gray-700 dark:text-gray-100">
                                    <th
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                        Facebook</th>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        5,480</td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <span class="mr-2">70%</span>
                                            <div class="relative w-full">
                                                <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                    <div style="width: 70%"
                                                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="text-gray-700 dark:text-gray-100">
                                    <th
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                        Twitter</th>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        3,380</td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <span class="mr-2">40%</span>
                                            <div class="relative w-full">
                                                <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                    <div style="width: 40%"
                                                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="text-gray-700 dark:text-gray-100">
                                    <th
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                        Instagram</th>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        4,105</td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <span class="mr-2">45%</span>
                                            <div class="relative w-full">
                                                <div class="overflow-hidden h-2 text-xs flex rounded bg-pink-200">
                                                    <div style="width: 45%"
                                                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-pink-500">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="text-gray-700 dark:text-gray-100">
                                    <th
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                        Google</th>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        4,985</td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <span class="mr-2">60%</span>
                                            <div class="relative w-full">
                                                <div class="overflow-hidden h-2 text-xs flex rounded bg-red-200">
                                                    <div style="width: 60%"
                                                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-red-500">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="text-gray-700 dark:text-gray-100">
                                    <th
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                        Linkedin</th>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        2,250</td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <span class="mr-2">30%</span>
                                            <div class="relative w-full">
                                                <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                    <div style="width: 30%"
                                                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-700">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- ./Social Traffic -->

            <!-- Recent Activities -->
            <div class="relative flex flex-col min-w-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
                <div class="rounded-t mb-0 px-0 border-0">
                    <div class="flex flex-wrap items-center px-4 py-2">
                        <div class="relative w-full max-w-full flex-grow flex-1">
                            <h3 class="font-semibold text-base text-gray-900 dark:text-gray-50">Recent Activities</h3>
                        </div>
                        <div class="relative w-full max-w-full flex-grow flex-1 text-right">
                            <button
                                class="bg-blue-500 dark:bg-gray-100 text-white active:bg-blue-600 dark:text-gray-800 dark:active:text-gray-700 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                type="button">See all</button>
                        </div>
                    </div>
                    <div class="block w-full">
                        <div
                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Today
                        </div>
                        <ul class="my-1">
                            <li class="flex px-4">
                                <div class="w-9 h-9 rounded-full flex-shrink-0 bg-indigo-500 my-2 mr-3">
                                    <svg class="w-9 h-9 fill-current text-indigo-50" viewBox="0 0 36 36">
                                        <path
                                            d="M18 10c-4.4 0-8 3.1-8 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L18.9 22H18c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z">
                                        </path>
                                    </svg>
                                </div>
                                <div
                                    class="flex-grow flex items-center border-b border-gray-100 dark:border-gray-400 text-sm text-gray-600 dark:text-gray-100 py-2">
                                    <div class="flex-grow flex justify-between items-center">
                                        <div class="self-center">
                                            <a class="font-medium text-gray-800 hover:text-gray-900 dark:text-gray-50 dark:hover:text-gray-100"
                                                href="#0" style="outline: none;">Nick Mark</a> mentioned <a
                                                class="font-medium text-gray-800 dark:text-gray-50 dark:hover:text-gray-100"
                                                href="#0" style="outline: none;">Sara Smith</a> in a new post
                                        </div>
                                        <div class="flex-shrink-0 ml-2">
                                            <a class="flex items-center font-medium text-blue-500 hover:text-blue-600 dark:text-blue-400 dark:hover:text-blue-500"
                                                href="#0" style="outline: none;">
                                                View<span><svg width="20" height="20" viewBox="0 0 20 20"
                                                        fill="currentColor"
                                                        class="transform transition-transform duration-500 ease-in-out">
                                                        <path fill-rule="evenodd"
                                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                            clip-rule="evenodd"></path>
                                                    </svg></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="flex px-4">
                                <div class="w-9 h-9 rounded-full flex-shrink-0 bg-red-500 my-2 mr-3">
                                    <svg class="w-9 h-9 fill-current text-red-50" viewBox="0 0 36 36">
                                        <path d="M25 24H11a1 1 0 01-1-1v-5h2v4h12v-4h2v5a1 1 0 01-1 1zM14 13h8v2h-8z">
                                        </path>
                                    </svg>
                                </div>
                                <div
                                    class="flex-grow flex items-center border-gray-100 text-sm text-gray-600 dark:text-gray-50 py-2">
                                    <div class="flex-grow flex justify-between items-center">
                                        <div class="self-center">
                                            The post <a
                                                class="font-medium text-gray-800 dark:text-gray-50 dark:hover:text-gray-100"
                                                href="#0" style="outline: none;">Post Name</a> was removed by <a
                                                class="font-medium text-gray-800 hover:text-gray-900 dark:text-gray-50 dark:hover:text-gray-100"
                                                href="#0" style="outline: none;">Nick Mark</a>
                                        </div>
                                        <div class="flex-shrink-0 ml-2">
                                            <a class="flex items-center font-medium text-blue-500 hover:text-blue-600 dark:text-blue-400 dark:hover:text-blue-500"
                                                href="#0" style="outline: none;">
                                                View<span><svg width="20" height="20" viewBox="0 0 20 20"
                                                        fill="currentColor"
                                                        class="transform transition-transform duration-500 ease-in-out">
                                                        <path fill-rule="evenodd"
                                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                            clip-rule="evenodd"></path>
                                                    </svg></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div
                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Yesterday
                        </div>
                        <ul class="my-1">
                            <li class="flex px-4">
                                <div class="w-9 h-9 rounded-full flex-shrink-0 bg-green-500 my-2 mr-3">
                                    <svg class="w-9 h-9 fill-current text-light-blue-50" viewBox="0 0 36 36">
                                        <path
                                            d="M23 11v2.085c-2.841.401-4.41 2.462-5.8 4.315-1.449 1.932-2.7 3.6-5.2 3.6h-1v2h1c3.5 0 5.253-2.338 6.8-4.4 1.449-1.932 2.7-3.6 5.2-3.6h3l-4-4zM15.406 16.455c.066-.087.125-.162.194-.254.314-.419.656-.872 1.033-1.33C15.475 13.802 14.038 13 12 13h-1v2h1c1.471 0 2.505.586 3.406 1.455zM24 21c-1.471 0-2.505-.586-3.406-1.455-.066.087-.125.162-.194.254-.316.422-.656.873-1.028 1.328.959.878 2.108 1.573 3.628 1.788V25l4-4h-3z">
                                        </path>
                                    </svg>
                                </div>
                                <div
                                    class="flex-grow flex items-center border-gray-100 text-sm text-gray-600 dark:text-gray-50 py-2">
                                    <div class="flex-grow flex justify-between items-center">
                                        <div class="self-center">
                                            <a class="font-medium text-gray-800 hover:text-gray-900 dark:text-gray-50 dark:hover:text-gray-100"
                                                href="#0" style="outline: none;">240+</a> users have subscribed to <a
                                                class="font-medium text-gray-800 dark:text-gray-50 dark:hover:text-gray-100"
                                                href="#0" style="outline: none;">Newsletter #1</a>
                                        </div>
                                        <div class="flex-shrink-0 ml-2">
                                            <a class="flex items-center font-medium text-blue-500 hover:text-blue-600 dark:text-blue-400 dark:hover:text-blue-500"
                                                href="#0" style="outline: none;">
                                                View<span><svg width="20" height="20" viewBox="0 0 20 20"
                                                        fill="currentColor"
                                                        class="transform transition-transform duration-500 ease-in-out">
                                                        <path fill-rule="evenodd"
                                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                            clip-rule="evenodd"></path>
                                                    </svg></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- ./Recent Activities -->
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
