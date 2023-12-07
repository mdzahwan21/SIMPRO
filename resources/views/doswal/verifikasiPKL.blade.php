  <!-- Main modal -->
  <div id="verifikasi-PKL" tabindex="-1" aria-hidden="true"
      class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative w-full max-w-md max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <button type="button"
                  class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                  data-modal-hide="verifikasi-PKL">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                      viewBox="0 0 14 14">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                  </svg>
                  <span class="sr-only">Close modal</span>
              </button>
              <div class="flex items-center justify-center p-4 rounded-lg">
                  <p class="text-lg font-bold text-gray-900 truncate dark:text-gray-300" role="none">
                      VERIFIKASI DATA PKL
                  </p>
              </div>
              <div class="w-full p-4 rounded-lg">
                  <div class="mt-4 flex flex-col items-center">
                      <div class="mb-4 flex items-center">
                          <img src="https://freesvg.org/img/abstract-user-flat-4.png" alt="Foto Profil"
                              class="w-16 h-16 rounded-full mr-4 ml-2">
                          <div class="text-gray-900">
                              {{-- not use controller. using data-irs-id from verListIRS.blade.php --}}
                              <p class="font-normal" id="verifikasi-nama">Nama: {{ $data->mahasiswa->nama }}</p>
                              <p class="font-normal" id="verifikasi-nim">NIM: {{ $data->mahasiswa->nim }}</p>
                              <p class="font-normal" id="verifikasi-angkatan">Angkatan: {{ $data->mahasiswa->angkatan }}
                              </p>
                          </div>
                      </div>
                  </div>
                  <div
                      class="flex flex-col justify-center items-center p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
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

                      <div>
                          <div class="mb-2 text-left">
                              <div class="w-full max-w-md">
                                  <div class="block mb-2 text-sm font-normal text-gray-900 dark:text-white">
                                      Semester Aktif: {{ $data->smt_aktif }}
                                  </div>
                              </div>
                          </div>

                          <div class="mb-2 text-left">
                              <div class="w-full max-w-md">
                                  <div class="block mb-2 text-sm font-normal text-gray-900 dark:text-white">
                                      Nilai: {{ $data->nilai }}
                                  </div>
                              </div>
                          </div>

                          <div class="mb-2 text-left">
                              <div class="w-full max-w-md">
                                  <div class="block mb-2 text-sm font-normal text-gray-900 dark:text-white">
                                      File PKL: {{ $data->file }}
                                  </div>
                              </div>
                          </div>

                          <input type="hidden" name="id" value="{{ $data->id }}">
                      </div>

                      <div class="mt-4 flex justify-center items-center space-x-2 mb-6">
                          <button data-modal-target="edit-PKL" data-modal-toggle="edit-PKL" data="{{ $data }}"
                              class="button-reject">Reject</button>

                          @include('doswal.editPKL')

                          <form class="w-full" method="POST" action="{{ route('approve.PKL', ['id' => $data->id]) }}"
                              enctype="multipart/form-data">
                              @csrf

                              <button type="submit" class="button-approve">Approve</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
