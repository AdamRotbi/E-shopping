<x-app-layout>
    <div class="flex flex-col items-center">
        <h2 class="text-2xl font-bold mb-4">Add New Product</h2>
        <div class="w-full max-w-md">
            @if ($errors->any())
                <!-- Error messages here -->
            @endif

            <form action="{{ route('products.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="namepr">
                        Name:
                    </label>            
                    <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Name">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="pricepr">
                        Price :
                    </label>            
                    <input type="text" name="price" id="price" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Price">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="category_id">
                        Category
                    </label>
                    <select name="category_id" id="category_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="imagepr">
                        Choose an image for your product
                    </label>
                    <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Image">
                </div>

                <div class="flex items-center justify-center">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Submit
                    </button>
                    <a class="ml-4 bg-gray-400 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" href="{{ route('products.index') }}">Back</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
