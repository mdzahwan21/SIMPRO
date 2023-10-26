@extends('layouts.main')

@section('body')
    <section class="bg-gray-50 dark:bg-gray-900 h-screen flex items-center justify-center">
        <div class="login-container p-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="mb-8 text-center">
                <img class="w-16 h-16 mx-auto mb-2" src="https://seeklogo.com/images/U/universitas-diponegoro-logo-6B2C58478B-seeklogo.com.png" alt="logo">
                <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">SIMPRO UNDIP</h1>
                <p class="text-gray-600 dark:text-gray-300">Sistem Monitoring Progress Studi Informatika</p>
            </div>

            <h2 class="text-lg font-medium text-gray-900 dark:text-white mb-2">Register Account</h2>

                    <form class="space-y-4 md:space-y-6" action="/register" method="POST">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukkan Email" required="">
                            @error('email')
                                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-100 dark:bg-gray-800 dark:text-red-400"
                                    role="alert">
                                    <span class="sr-only">Info</span>
                                    <div>
                                        <span class="font-medium">Perhatian!</span> {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="Masukkan Password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="">
                            @error('password')
                                <div class="red-alert" role="alert">
                                    <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <div>
                                        <span class="font-medium">Perhatian!</span> {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="m-auto">
                            <button type="submit"
                                class="w-full mr-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                Register
                            </button>
                        </div>

                        <div class="flex flex-col items-center'">
                            {{-- <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" aria-describedby="remember" type="checkbox"
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
                                        required="">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                                </div>
                            </div> --}}
                            <p class="text-center font-medium text-black-600 dark:text-primary-500">
                                Sudah memiliki akun? <a href="/login"
                                    class="text-sm font-medium text-blue-600 hover:text-blue-500 hover:underline dark:text-primary-500">Login</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection