<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Form</title>
    <style>
        /* Styles for the search form */
        .search-container {
            display: flex;
            align-items: center;
            margin-top: 1rem;
            transition: box-shadow 0.3s ease;
            border: 1px solid #ccc;
            border-radius: 0.375rem;
            overflow: hidden; /* Prevents button overflow */
        }

        .search-container:focus-within {
            box-shadow: 0 0 0 3px rgba(52, 144, 220, 0.2);
        }

        .search-input {
            flex: 1;
            padding: 0.5rem 2rem 0.5rem 2.5rem;
            font-size: 0.875rem;
            color: #333;
            border: none;
            border-radius: 0;
            background-color: #f9f9f9;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            min-width: 0; /* Allow input to shrink */
        }

        .search-input:focus {
            outline: none;
            border-color: #3490dc;
            box-shadow: 0 0 0 3px rgba(52, 144, 220, 0.2);
        }

        .search-icon {
            position: absolute;
            top: 50%;
            left: 0.75rem;
            transform: translateY(-50%);
            pointer-events: none;
            transition: transform 0.3s ease;
            width: 16px; /* Adjust the width */
            height: 16px; /* Adjust the height */
        }

        .search-input:focus+.search-icon {
            transform: translateY(-50%) scale(1.1);
        }

        .search-button {
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            color: #fff;
            background-color: #3490dc;
            border: none;
            border-radius: 0;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out, transform 0.2s ease;
        }

        .search-button:hover {
            background-color: #2779bd;
            transform: translateY(-1px);
        }
    </style>
</head>

<body>
    <div class="pb-4 bg-white dark:bg-gray-900">
        <div class="flex items-center justify-center">
            <div class="search-container flex items-center border border-gray-300 rounded-md overflow-hidden">
                <form action="/search/list-perwalian" method="GET" class="flex items-center">
                    <input type="search" id="table-search" name="search" class="search-input outline-none flex-1
                    py-2 px-3 text-gray-700 leading-tight focus:outline-none" placeholder="Search name or others">
                    <svg class="search-icon w-4 h-4 text-gray-500 dark:text-gray-400 ml-2" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <button type="submit" class="search-button bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4
                border border-blue-500">Cari</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
