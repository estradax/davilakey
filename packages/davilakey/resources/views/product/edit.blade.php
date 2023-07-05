<x-layout.master wrapperClass="bg-gray-800 h-screen">
    <x-island.navigation></x-island.navigation>

    <div class="max-w-screen-xl mx-auto p-4 flex items-start">
        <div class="w-64 mr-4 bg-gray-900 text-white p-4 rounded-lg border border-gray-700 shadow">
            <div class="flex justify-center">
                <img class="rounded-full w-48 h-48" src="{{ Storage::url($product->photo_url) }}" alt="Apple Watch">
            </div>
            <div class="mt-4 flex justify-center">
                <button type="button" class="text-sm font-semibold leading-6 text-indigo-500">Change</button>
            </div>
        </div>
        <div class="flex-1 bg-gray-900 text-white p-4 rounded-lg border border-gray-700 shadow">
            <form>
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10">
                        <h2 class="text-base font-semibold leading-7">Product #{{ $product->id }}</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly so be careful what you share.</p>

                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-4">
                                <label for="username" class="block text-sm font-medium leading-6">Name</label>
                                <div class="mt-2">
                                    <div class="flex rounded-md shadow-sm focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                        <input type="text" name="username" id="username" autocomplete="username" class="block flex-1 border border-gray-600 rounded-lg bg-gray-700 py-1.5 focus:ring-0 sm:text-sm" value="{{ $product->name }}">
                                    </div>
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="username" class="block text-sm font-medium leading-6">Price</label>
                                <div class="mt-2">
                                    <div class="flex rounded-md shadow-sm focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                        <input type="text" name="username" id="username" autocomplete="username" class="block flex-1 border border-gray-600 rounded-lg bg-gray-700 py-1.5 focus:ring-0 sm:text-sm" value="{{ $product->price }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-full">
                                <label for="about" class="block text-sm font-medium leading-6">Description</label>
                                <div class="mt-2">
                                    <textarea id="about" name="about" rows="3" class="block w-full rounded-md border-0 py-1.5 border border-gray-600 rounded-lg bg-gray-700 shadow-sm focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ $product->description }}</textarea>
                                </div>
                                <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences.</p>
                            </div>

                <div class="mt-6 flex items-center justify-end gap-x-6 col-span-full">
                    <button type="button" class="text-sm font-semibold leading-6 text-indigo-500">Cancel</button>
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</x-layout.master>
