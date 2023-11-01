@extends('mahasiswa.navbar')

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">

            @if (session('success'))
                <div class="p-4 mr-2 text-sm text-green-800 rounded-lg bg-green-100 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
                <br>
            @endif

            @if (session('error'))
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-100 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <span class="font-medium">{{ session('error') }}</span>
                </div>
                <br>
            @endif
            <h1 class="text-2xl mb-5 font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                Progress Skripsi
            </h1>
            <div class="m-auto">
                <a {{-- href="{{ route('skripsi.viewEntry') }}" --}}
                    class="mr-auto text-white bg-green-400 hover:bg-green-500 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-400 dark:hover:bg-green-500 focus:outline-none dark:focus:ring-green-600"
                    type="button">
                    + Tambah Progres Skripsi
                </a>
            </div>
            <div id="accordion-collapse" data-accordion="collapse">
                {{-- @foreach ($skripsiData as $skripsi)
                    <h2 id="accordion-collapse-heading-{{ $skripsi->semester }}">
                        <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover-bg-gray-800"
                            data-accordion-target="#accordion-collapse-body-{{ $skripsi->semester }}" aria-expanded="false"
                            aria-controls="accordion-collapse-body-{{ $skripsi->semester }}">
                            <span
                                class="text-l font-semibold leading-tight tracking-tight text-gray-900 md:text-l dark:text-white">Semester
                                {{ $skripsi->semester }} | Jumlah SKS {{ $skripsi->jml_sks }}</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-{{ $skripsi->semester }}" class="hidden"
                        aria-labelledby="accordion-collapse-heading-{{ $skripsi->semester }}">
                        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                            <h1
                                class="text-center text-lg font-semibold leading-tight tracking-tight text-gray-900 md:text-lg dark:text-white">
                                @if ($skripsi->status === 'Unverified')
                                    Menunggu verifikasi dosen wali
                                @elseif ($skripsi->status === 'Approved')
                                    <span class="text-base text-green-600 p-2 rounded-lg">skripsi sudah diverifikasi dosen
                                        wali</span>
                                @elseif ($skripsi->status === 'Rejected')
                                    <span class="text-red-600">skripsi tidak terverifikasi. Lakukan update data</span>
                                @endif
                            </h1>
                            <br>
                            <div class="form-group">
                                <label for="semester"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Semester</label>
                                <input type="text" id="semester" name="semester" value="{{ $skripsi->semester }}"
                                    aria-label="disabled input"
                                    class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    disabled>
                            </div>
                            <div class="form-group">
                                <label for="jml_sks"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah SKS</label>
                                <input type="text" id="jml_sks" name="jml_sks" value="{{ $skripsi->jml_sks }}"
                                    aria-label="disabled input"
                                    class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    disabled>
                            </div>
                            <div class="form-group">
                                <label for="scan_skripsi"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Scan skripsi <a
                                        href="{{ asset('storage/' . $skripsi->scan_skripsi) }}"
                                        class="bg-blue-100 hover:bg-blue-200 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400 inline-flex items-center justify-center">Lihat
                                        file</a></label>
                            </div>
                            @if ($skripsi->status === 'Rejected')
                                <a href="{{ route('skripsi.viewEditskripsi', [$skripsi->id_skripsi]) }}"
                                    class="mr-auto text-white bg-blue-500 hover:bg-blue-500 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-400 dark:hover:bg-blue-500 focus:outline-none dark:focus:ring-blue-600"
                                    type="button">
                                    Edit
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach --}}
            </div>
        </div>
    </div>
    </div>
@endsection