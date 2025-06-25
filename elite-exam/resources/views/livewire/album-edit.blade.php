<div> 
    <livewire:nav-bar />
    <div>
        <section class="bg-gray-50">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto my-10 lg:py-0">
            <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    @php
                        $curr_album = App\Models\Album::where('id', $id)->first();
                        $curr_artist = App\Models\Artist::where('id', operator: $curr_album->artist_id)->first();
                        $artists = App\Models\Artist::all();
                    @endphp
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl ">
                        Edit Album
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('album-update', ['id' => $id]) }}" method="POST" x-data="{ year: '', name: '', sales: null, artist: '{{ $curr_album->artist_id }}', url: '' }">
                        @csrf
                        @method('PATCH')
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                            <input x-model="name" type="text" name="name" id="name" placeholder="{{ $curr_album->name }}"  class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" >
                        </div>
                        <div>
                            <label for="year" class="block mb-2 text-sm font-medium text-gray-900 ">year</label>
                            <input x-model="year" type="number" min="1800" max="2025" name="year" id="year" placeholder="{{ $curr_album->year }}" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" >
                        </div>
                        <div>
                            <label for="sales" class="block mb-2 text-sm font-medium text-gray-900 ">Sales</label>
                            <input x-model="sales" type="number" min="0" name="sales" id="sales" placeholder="{{ $curr_album->sales }}"  class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" >
                        </div>
                        <div>
                            <label for="artist" class="block mb-2 text-sm font-medium text-gray-900">Artist</label>
                            <select x-model="artist" name="artist" id="artist"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                                <option value="{{ $curr_album->artist_id }}" disabled selected>{{ $curr_artist->name }} ({{ $curr_artist->code }})</option>
                                @foreach ($artists as $artist)
                                    <option value="{{ $artist->id }}">{{ $artist->name }} ({{ $artist->code }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="cover_pic_url" class="block mb-2 text-sm font-medium text-gray-900 ">Cover Photo Url</label>
                            <input x-model="url" type="text" name="cover_pic_url" id="cover_pic_url" placeholder="https://"  class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" >
                        </div>
                        <hr class="border-t border-gray-300 w-full">
                        <div class="flex items-center justify-end gap-2">
                            <button type="submit" class="w-full text-black border border-gray-300 bg-primary-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center hover:cursor-pointer disabled:cursor-not-allowed" :disabled="(year == '' && name == '' && !sales && artist == '' && !cover_pic_url)">Save</button>
                            <a href="{{ route('dashboard') }}" class="w-full text-black border border-gray-300 bg-primary-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center hover:cursor-pointer">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </section>
    </div>
</div>
