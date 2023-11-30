@extends('operator.navbar')
@section('content')
<div class="w-full">
    <div class="flex flex-col gap-8 p-4">
        <form class="flex flex-col w-full p-4 border-2 border-black border-dashed rounded-lg" id="importform" enctype="multipart/form-data">
            <h1 class="bg-blue-500 text-white text-center p-2 m-5 rounded">Import Data</h1>
            <div class="p-2 m-5">
                <label for="file" class="text-lg font-semibold">Choose File:</label>
                <input type="file" id="file" name="file" accept=".csv, .xlsx" class="p-2 border-2 border-gray-300 rounded-md">
            </div>
            <button type="submit" class="w-1/2 bg-green-500 text-white p-2 m-5 rounded-md hover:bg-green-600 transition duration-300">Commit</button>
        </form>
    </div>
</div>
@endsection
