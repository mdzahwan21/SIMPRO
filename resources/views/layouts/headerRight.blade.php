<p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
    {{ auth()->user()->email }}
</p>
<div class="flex items-center ml-3">
    <div>
        <button type="button"
            class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
            aria-expanded="false" data-dropdown-toggle="dropdown-user">
            <span class="sr-only">Open user menu</span>
            <img class="w-8 h-8 rounded-full" src="https://media.licdn.com/dms/image/C5603AQFg5fhHcCfs2g/profile-displayphoto-shrink_800_800/0/1658109361552?e=1706745600&v=beta&t=CeAb6STx8PaIMD9EgkbK-bEjywdv3c02BzU0hflACRA"
                alt="user photo">
        </button>
    </div>
    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
        id="dropdown-user">
        <div class="px-4 py-3" role="none">
            <p class="text-sm text-gray-900 dark:text-white" role="none">
                {{ auth()->user()->name }}
            </p>
            <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                {{ auth()->user()->email }}
            </p>
        </div>
        <ul class="py-1" role="none">
            <li>
                <a href="/updateProfile"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                    role="menuitem">Update Profile</a>
            </li>
            <li>
                <form action="/logout" method="post"
                    class="block h-full px-4 py-2 text-sm text-red-700 hover:bg-gray-100 dark:text-gray-300
dark:hover:bg-gray-600 dark:hover:text-red"
                    role="menuitem">
                    @csrf
                    <button type="submit" class="h-full w-full text-left">Log out</button>
                </form>
            </li>
        </ul>
    </div>

</div>