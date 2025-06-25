<div>
    <livewire:nav-bar />

    <div class="relative overflow-x-auto shadow-md rounded-md w-3/4 mx-auto my-2">
        <table class="w-full text-sm text-left rtl:text-right text-gray-600">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Artist</th>
                    <th scope="col" class="px-6 py-3">Album Name</th>
                    <th scope="col" class="px-6 py-3">Year Released</th>
                    <th scope="col" class="px-6 py-3">2022 Sales</th>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>