<div> 
    <livewire:nav-bar />
    <div>
        <section class="bg-gray-50">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto my-10 lg:py-0">
            <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl ">
                        Create Artist
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('artist-store') }}" method="POST" x-data="{ name: '', code: '' }">
                        @csrf
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                            <input x-model="name" type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" >
                        </div>
                        <div>
                            <label for="code" class="block mb-2 text-sm font-medium text-gray-900 ">Code</label>
                            <input x-model="code" type="text" name="code" id="code"  class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" >
                        </div>
                        <hr class="border-t border-gray-300 w-full">
                        <div class="flex items-center justify-end gap-2">
                            <button type="submit" class="w-full text-black border border-gray-300 bg-primary-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center hover:cursor-pointer disabled:cursor-not-allowed" :disabled="(name == '' || code == '')">Save</button>
                            <a href="{{ route('artists') }}" class="w-full text-black border border-gray-300 bg-primary-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center hover:cursor-pointer">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </section>
    </div>
</div>
