@extends('operator.navbar')
@section('content')
    <div class="w-full m-5 p-5 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <p>
            Welcome, {{ auth()->user()->name }}!
        </p>
    </div>
@endsection
