<!-- Main modal -->
<div id="edit-KHS" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="edit-KHS">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="flex items-center justify-center p-4 rounded-lg">
                <p class="text-lg font-bold text-gray-900 truncate dark:text-gray-300" role="none">
                    EDIT DATA KHS
                </p>
            </div>
            <div class="w-full p-4 rounded-lg">
                <div class="mt-4 flex flex-col items-center">
                    <div class="mb-4 flex items-center">
                        <img src="https://freesvg.org/img/abstract-user-flat-4.png" alt="Foto Profil"
                            class="w-16 h-16 rounded-full mr-4 ml-2">
                        <div class="text-gray-900">
                            <p class="font-normal" id="verifikasi-nama">Nama: {{ $data->mahasiswa->nama }}</p>
                            <p class="font-normal" id="verifikasi-nim">NIM: {{ $data->mahasiswa->nim }}</p>
                            <p class="font-normal" id="verifikasi-angkatan">Angkatan: {{ $data->mahasiswa->angkatan }}
                        </div>
                    </div>
                </div>
                <div class="flex flex-col p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                    <form class="flex flex-col w-full" method="POST" action="{{ route('update.KHS') }}"
                        enctype="multipart/form-data">
                        @csrf

                        @if (session('success'))
                            <div class="p-4 bg-green-100 text-green-800 rounded-lg mb-4 text-center">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="p-4 bg-red-100 text-red-800 rounded-lg mb-4 text-center">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="flex items-center mb-6">
                            <div class="w-full max-w-md">
                                <label for="smt_aktif"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Semester
                                    Aktif:</label>
                                <select id="smt_aktif" name="smt_aktif" placeholder="{{ $data->smt_aktif }}"
                                    value="{{ old('smt_aktif', $data->smt_aktif) }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-800">
                                    <option selected disabled>Pilih semester aktif</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex items-center mb-6">
                            <div class="w-full max-w-md">
                                <label for="sks"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">
                                    Jumlah SKS:</label>
                                <input type="number" id="sks" name="sks"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-800 dark:focus:border-blue-800"
                                    placeholder="{{ $data->sks }}" min="1" max="24" required
                                    value="{{ old('sks', $data->sks) }}">
                            </div>
                        </div>

                        <div class="flex items-center mb-6">
                            <div class="w-full max-w-md">
                                <label for="sks_kum"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">
                                    SKS kumulatif:</label>
                                <input type="number" id="sks_kum" name="sks_kum"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-800 dark:focus:border-blue-800"
                                    placeholder="{{ $data->sks_kum }}" min="1" max="165" required
                                    value="{{ old('sks_kum', $data->sks_kum) }}">
                            </div>
                        </div>

                        <div class="flex items-center mb-6">
                            <div class="w-full max-w-md">
                                <label for="ip"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">
                                    IP:</label>
                                <input type="number" id="ip" name="ip"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-800 dark:focus:border-blue-800"
                                    placeholder="{{ $data->ip }}" step="0.01" min="0" max="4"
                                    required value="{{ old('ip', $data->ip) }}">
                            </div>
                        </div>

                        <div class="flex items-center mb-6">
                            <div class="w-full max-w-md">
                                <label for="ipk"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">
                                    IPK:</label>
                                <input type="number" id="ipk" name="ipk"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-800 dark:focus:border-blue-800"
                                    placeholder="{{ $data->ipk }}" step="0.01" min="0" max="4"
                                    required value="{{ old('ipk', $data->ipk) }}">
                            </div>
                        </div>

                        <div class="flex items-center mb-6">
                            <div class="w-full max-w-md">
                                <label for="file"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">
                                    File KHS:</label>
                                <input type="text" disabled id="file" name="file"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-800 dark:focus:border-blue-800"
                                    placeholder="{{ $data->file }}" required
                                    value="{{ old('file', $data->file) }}">
                            </div>
                        </div>

                        <input type="hidden" name="id" value="{{ $data->id }}">

                        <div class="flex justify-center items-center mb-6">
                            <button type="submit"
                                class="text-white bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover-bg-blue-700 dark:focus:ring-blue-800">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
