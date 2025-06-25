<div>
    <div class="absolute top-0 w-full">
        <livewire:nav-bar />
    </div>

    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="w-1/2 px-6 py-6 text-center bg-gray-900 rounded-lg lg:mt-0 xl:px-10 mx-auto my-10">
            @php
                $album = \App\Models\Album::where('id', $id)->first();
                $artist = \App\Models\Artist::where('id', $album->artist_id)->first();
            @endphp
            <div class="space-y-4 xl:space-y-6">
                @if ($album->cover_pic_url === null)
                    <svg class="mx-auto rounded-full h-36 w-36" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-icon lucide-user"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                @else
                    <img class="mx-auto rounded-full h-36 w-36" src="{{ $album->cover_pic_url }}" alt="">
                @endif
                <div class="space-y-2">
                    <div class="flex justify-center items-center flex-col space-y-3 text-lg font-medium leading-6 text-white">
                        <h3>{{ $album->name }}</h3>
                        <div>
                            <p class="text-indigo-300">{{ $artist->name . "(" . $artist->code . ")" }}</p>
                            <p class="text-indigo-300">{{ $album->year }}</p>
                        </div>
                        <div class="flex justify-center mt-5 space-x-5">
                            <p>Album Sales: {{ $album->sales }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>