<x-app-layout>
  <h1 class="text-3xl mb-8 dark:text-white">E-shopping with you anywhere</h1>
  <div class="flex justify-center space-x-4 mb-6 ">
    <form class="flex" action="{{ route('search') }}" method="GET">
      <input class="border rounded px-2 py-1 mr-2" type="text" name="search" placeholder="Name" aria-label="Search">
      <button class="bg-blue-500 text-white px-4 py-2 rounded" type="submit">search per name</button>
    </form>
    <form class="flex" action="{{ route('searchByPrice') }}" method="GET">
      <input class="border rounded px-2 py-1 mr-2" type="text" name="minPrice" placeholder="minPrice">
      <input class="border rounded px-2 py-1 mr-2" type="text" name="maxPrice" placeholder="maxPrice">
      <button class="bg-blue-500 text-white px-4 py-2 rounded" type="submit">search per price</button>
    </form>
  </div>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    @foreach($products as $product)
      <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <img src="{{ asset('storage/uploads/' . $product->image) }}" alt="{{ $product->name }}" class="h-48 w-full object-cover rounded-t-lg">
        <div class="p-4">
          <h4 class="text-lg font-semibold dark:text-white">{{ $product->name }}</h4>
          <p class="text-gray-600 dark:text-gray-400 mt-2">{{ $product->price }}DH</p>
        </div>
        <div class="bg-gray-100 dark:bg-gray-700 px-4 py-2 rounded-b-lg flex justify-end">
            <form action="{{ route('add.to.cart', $product->id) }}" method="post">
            @csrf
            <button type="submit" class="text-blue-500 hover:text-blue-600 font-semibold">Add to cart</button>
            </form>
        </div>
      </div>
    @endforeach
  </div>
</x-app-layout>
