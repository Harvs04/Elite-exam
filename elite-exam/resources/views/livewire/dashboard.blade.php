<div class="bg-gray-100" x-data="{ openDeleteModal: false, id: null }">
    <livewire:nav-bar />

    <div class="flex flex-col gap-2 my-4">
        <div class="flex items-end justify-center gap-2 w-full mx-auto">
            <div class="flex flex-col gap-1 w-2/5">
                <label for="default-input" class="block text-sm font-medium text-gray-900">Search</label>
                <input type="text" id="default-input" placeholder="Artist name, code..." wire:model.live.debounce.250ms="artist" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <a href="{{ route('album-create') }}" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create Album</a>
        </div>
        <div class="flex items-center justify-center">
            <div class="relative overflow-x-auto shadow-md rounded-md w-3/4 mx-auto my-2">
                <table class="w-full text-sm text-left rtl:text-right text-gray-600">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Artist</th>
                            <th scope="col" class="px-6 py-3">Album Name</th>
                            <th scope="col" class="px-6 py-3">Year Released</th>
                            <th scope="col" class="px-6 py-3">2022 Sales</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($albums as $album)
                            <tr class="bg-gray-900 border-b border-gray-700 ">
                                <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap">{{ $album->artist->code }}
                                </th>
                                <td class="px-6 py-4">{{ $album->name }}</td>
                                <td class="px-6 py-4">{{ $album->year }}</td>
                                <td class="px-6 py-4">{{ $album->sales }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-2">
                                        <a href="{{ route('album-view', ['id' => $album->id]) }}" class="font-medium text-gray-600 dark:text-gray-500 hover:underline">View</a>
                                        <a href="{{ route('album-edit', ['id' => $album->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                        <button @click="openDeleteModal = !openDeleteModal; id = {{ $album->id }}" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</buttonn>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @teleport('body')
        <div x-show="openDeleteModal" id="popup-modal" tabindex="-1" class="backdrop-blur-xs overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" @click="openDeleteModal = false">
                        <svg class="w-3 h-3"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <form class="p-4 md:p-5 text-center" :action="`/albums/destroy/${id}`" method="POST">
                        @csrf
                        @method('DELETE')
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this album?</h3>
                        <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Yes, I'm sure
                        </button>
                        <button type="button" @click="openDeleteModal = false" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                    </form>
                </div>
            </div>
        </div>
    @endteleport
</div>