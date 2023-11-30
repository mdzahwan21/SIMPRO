<!-- Filter Status -->
<div>
    <label for="filter-status" class="block text-sm text-gray-700 dark:text-gray-400">Status</label>
    <select id="filter-status"
        class="block mt-1 w-28 text-sm text-gray-900 border border-gray-300 rounded-md bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @foreach (['aktif', 'cuti', 'mangkir', 'undur diri', 'meninggal dunia', 'drop out', 'lulus'] as $status)
            <option value="{{ $status }}">{{ $status }}</option>
        @endforeach
    </select>
</div>
