  <!-- Main modal -->
  <div id="cek-IRS" tabindex="-1" aria-hidden="true"
      class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative w-full max-w-md max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <button type="button"
                  class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                  data-modal-hide="cek-IRS">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                      viewBox="0 0 14 14">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                  </svg>
                  <span class="sr-only">Close modal</span>
              </button>
              <div class="flex items-center justify-center p-4 rounded-lg">
                  <p class="text-lg font-bold text-gray-900 truncate dark:text-gray-300" role="none">
                      VERIFIKASI DATA IRS
                  </p>
              </div>
              <div class="w-full p-4 rounded-lg">
                  <div class="mt-4 flex flex-col items-center">
                      <div class="mb-4 flex items-center">
                          <img src="https://freesvg.org/img/abstract-user-flat-4.png" alt="Foto Profil"
                              class="w-16 h-16 rounded-full mr-4 ml-2">
                          <div class="text-gray-900">
                              <div class="font-normal">Nama: Mochammad Dzahwan Fadhloly</div>
                              <div class="font-normal">NIM: 24060121140168</div>
                              <div class="font-normal">Angkatan: 2021</div>
                          </div>
                      </div>
                  </div>
                  <div class="flex p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                      <form class="flex flex-col w-full" method="POST" action="{{ route('khs.store') }}"
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

                          <div class="flex justify-center items-center mb-6">
                              <div class="w-full max-w-md">
                                  <label for="smt_aktif"
                                      class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                      Semester Aktif:</label>
                                  {{-- <input type="number" id="smt_aktif" name="smt_aktif"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-800 dark:focus:border-blue-800"
                                    placeholder="masukkan semester aktif" min="1" max="14" required> --}}
                              </div>
                          </div>

                          <div class="flex justify-center items-center mb-6">
                              <div class="w-full max-w-md">
                                  <label for="sks"
                                      class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Jumlah
                                      SKS:</label>
                                  {{-- <input type="number" id="sks" name="sks"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-800 dark:focus:border-blue-800"
                                    placeholder="masukkan jumlah sks" min="1" max="24" required> --}}
                              </div>
                          </div>

                          <div class="flex justify-center items-center mb-6">
                              <div class="w-full max-w-md">
                                  <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                      for="file_input">File IRS:</label>
                                  <a href="#" target="_blank"
                                      class="block w-full text-sm text-blue-500 hover:underline">KHS_Dzahwan</a>
                                  {{-- <input
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    id="file_input" name="file_input" type="file" required> --}}
                              </div>
                          </div>

                          <div class="flex justify-center items-center mb-6">
                              <button data-modal-target="edit-IRS" data-modal-toggle="edit-IRS" 
                              {{-- data-modal-hide="cek-IRS" --}}
                                  class="text-white bg-gray-800 hover:bg-gray-200 hover:text-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Reject
                              </button>
                              @include('doswal.editIRS')
                              <button type="submit"
                                  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Approve</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
