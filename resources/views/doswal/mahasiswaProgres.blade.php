@extends('doswal.navbar')

@section('content')
    <div class="progres-details">
        <div class="flex flex-col-2">
            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="flex flex-col items-center p-10">
                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="https://source.unsplash.com/random"
                        alt="user image" />
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Nama: {{ $mahasiswa->nama }}</h5>
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">NIM: {{ $mahasiswa->nim }}</h5>
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Angkatan: {{ $mahasiswa->angkatan }}</h5>
                </div>
            </div>
    
            <!-- Display semester buttons -->
            <div class="tombol-semester">
                @foreach ($semesters as $semester)
                    <a href="{{ route('mahasiswa.semester', ['nim' => $mahasiswa->nim, 'smt' => $semester['smt']]) }}"
                        class="semester-button {{ $semester['hasApproval'] ? 'approved' : 'not-approved' }}">
                        Semester {{ $semester['smt'] }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
