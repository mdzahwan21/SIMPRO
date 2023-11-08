@extends('doswal.navbar')

@section('content')
    <div class="w-full p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <p class="text-sm font-large text-gray-900 truncate dark:text-gray-300" role="none">
            Welcome, {{ auth()->user()->name }}!
        </p>
    </div>
@endsection
