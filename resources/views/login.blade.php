@extends('layouts.main')

@section('body')
    <section class="bg-gray-50 dark:bg-gray-900 h-screen flex items-center justify-center">
        <div class="login-container p-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="mb-8 text-center">
                <img class="w-16 h-16 mx-auto mb-2" src="https://seeklogo.com/images/U/universitas-diponegoro-logo-6B2C58478B-seeklogo.com.png" alt="logo">
                <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">SIMPRO UNDIP</h1>
                <p class="text-gray-600 dark:text-gray-300">Sistem Monitoring Progress Studi Informatika</p>
            </div>

            <h2 class="text-lg font-medium text-gray-900 dark:text-white mb-2">Login Your Account</h2>

        @if (session()->has('loginError'))
            <div class="red-alert" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Perhatian!</span> {{ session('loginError') }}
                </div>
            </div>
        @endif

        @if (session()->has('logoutSuccess'))
            <div class="green-alert" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    {{ session('logoutSuccess') }}
                </div>
            </div>
        @endif

        <form class="space-y-4 md:space-y-6" action="/login" method="POST">
            @csrf
            <div>
                <label for="email" class="form-label">
                    Email
                </label>
                <input type="email" name="email" id="email" class="form-input"
                    placeholder="name@company.com" autofocus value="{{ old('email') }}">
                @error('email')
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
            <div>
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" placeholder="password" class="form-input">
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
            <button type="submit" class="full-horizontal-button">
                Log in
            </button>
            <div class="flex flex-col items-center'">
                            
                <p class="text-center font-medium text-black-600 dark:text-primary-500">
                    Belum memiliki akun? <a href="/register"
                        class="text-sm font-medium text-blue-600 hover:text-blue-500 hover:underline dark:text-primary-500">Register</a>
                </p>
            </div>
        </form>
    </div>
</div>
</div>
</section>
@endsection
