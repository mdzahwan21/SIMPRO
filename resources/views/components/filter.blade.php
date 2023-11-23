<div x-show="filterOpen" class="flex space-x-4">
    <!-- Filter Status -->
    <div>
        <label for="filter-status" class="block text-sm text-gray-700 dark:text-gray-400">Status</label>
        <select id="filter-status"
            class="block mt-1 w-28 text-sm text-gray-900 border border-gray-300 rounded-md bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="aktif">Aktif</option>
            <option value="ud">Undur Diri</option>
            <option value="mangkir">Mangkir</option>
            <option value="do">Drop Out</option>
            <option value="cuti">Cuti</option>
            <option value="lulus">Lulus</option>
            <option value="md">Meninggal Dunia</option>
        </select>
    </div>

    <!-- Filter Tahun Awal -->
    <div>
        <label for="filter-start-year" class="block text-sm text-gray-700 dark:text-gray-400">Start Year</label>
        <input type="text" id="filter-start-year" pattern="\d{4}"
            class="block mt-1 w-20 text-sm text-gray-900 border border-gray-300 rounded-md bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>

    <!-- Filter Tahun Akhir -->
    <div>
        <label for="filter-end-year" class="block text-sm text-gray-700 dark:text-gray-400">End Year</label>
        <input type="text" id="filter-end-year" pattern="\d{4}"
            class="block mt-1 w-20 text-sm text-gray-900 border border-gray-300 rounded-md bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>
</div>
