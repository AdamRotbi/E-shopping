
<x-app-layout>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex items-center justify-between pb-4 bg-white dark:bg-gray-900">  
            <label for="table-search" class="sr-only">Search</label>
            <div class="flex justify-between  bg-sky-500 mr-20 rounded-xl">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="text" id="table-search-users" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for users">
            </div>
                <a href={{ route('products.create') }}  >
                    <button class=" text-white-400 rounded-xl p-2 text-center  ">
                        Add Product
                    </button>
                </a>
            {{-- </caption> --}}
        </div>
        </div>
        <table class="w-full text-sm text-left text-gray-100 dark:text-gray-400">
        <thead class="text-xs text-gray-100 uppercase bg-gray-50 dark:bg-gray-500 dark:text-gray-400">
            <tr>
                
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product )        
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                
                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    <div class="px-6 py-0">
                        <div class="flex items-center gap-8 text-base font-semibold "> <img class="w-20 h-20 object-cover rounded-xl"src="{{ asset('storage/uploads/'.$product->image) }}" class="rounded-xl h-20 " /> {{ $product->name }}</div> 
                    </div>  
                </th>
                <td class="px-6 py-4 text-green-600 font-semibold">
                    {{ $product->price }} DH
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center uppercase"  id="{{ $product->category_id }}">
                        {{ $product->category->name }}
                    </div>
                    
                </td>
    
                <td class="px-6 py-6">
                    <div class="flex  gap-8 text-base font-semibold">
                        <form method="GET" action="{{ route('products.edit', $product->id) }}"  >
                            @csrf
                            <button type="submit" class="text-cyan-500	"> Edit </a>
                        </form> 


                        <form method="POST" action="{{ route('products.destroy', $product->id) }}"  >
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="text-red-500	"> Delete </a>
                        </form>          
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
        
    </div>
</x-app-layout>
