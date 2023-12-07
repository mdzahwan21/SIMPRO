@extends('operator.navbar')
@section('content')
<div class="w-full">
    <div class="flex flex-col gap-8 p-4">
        <form class="flex flex-col w-full p-4 border-2 border-black border-dashed rounded-lg" id="importform" action="{{ route('UsersController.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if(session('success'))
            <div class="p-2 rounded m-4 bg-green-400 text-center text-white">
                <div>
                    <h1>Data Import Sukses</h1>
                    <button class="close-btn bg-red-700 p-2 m-2 rounded" onclick="closeOverlay()">Close</button>
                </div>
            </div>
            @endif
            <h1 class="bg-blue-500 text-white text-center p-2 m-5 rounded">Import Data</h1>
            <div class="p-2 m-5">
                <label for="file" class="text-lg font-semibold">Choose File:</label>
                <input type="file" id="file" name="file" accept=".csv, .xlsx" class="p-2">
            </div>
            <button type="submit" class="w-fit bg-gray-800 text-white p-2 m-5 rounded-md hover:bg-gray-600 hover:text-white transition duration-300">Import</button>
        </form>
    </div>

</div>
<script>
    function closeOverlay() {
        var overlay = document.querySelector('.overlay');
        overlay.style.display = 'none';
    }
</script>
@endsection