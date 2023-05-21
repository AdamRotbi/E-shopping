{{-- <x-app-layout>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <caption class="p-5 text-lg font-semibold text-left  text-gray-900 bg-white dark:text-white dark:bg-gray-800">
            <div class="flex justify-between">
                categorys
                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400" >Browse a list of Flowbite categorys designed to help you work and play, stay organized, get answers, keep in touch, grow your business, and more.</p> 
                <a href={{ route('categorys.create') }} class="text-white bg-green-500 hover:bg-green-800 rounded-xl p-2 w-8 text-center  " >
                        +
                </a>
            </div>
        </caption>

        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    category 
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="">Actions</span>
                </th>           
            </tr>
        </thead>
        <tbody>
            @foreach($categorys as $category)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">     
                    <td class="flex gap-8 text-center">{{ $category->name }} <img src="{{ asset('storage/uploads/'.$category->image) }}" class="rounded-full h-20" /></td>
                    <td>{{ $category->price}}</td>
                    <td > </td>

                     <td>{{ $category->city->name }}</td> 
                    <td>
                        <button type="button" onclick="confirmDelete({{ $category->id }})">Supprimer</button>
                        <a href="{{ route('category.edit', ['id' => $category->id]) }}">Modifier</a> 
                    </td>
                </tr>
            @endforeach 
                            
            </tr>
        </tbody>
    </table>
</div>
</x-app-layout> --}}
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
                <a href={{ route('categories.create') }}  >
                    <button class=" text-white-400 rounded-xl p-2 text-center  ">
                        Add category
                    </button>
                </a>
            {{-- </caption> --}}
        </div>
        </div>
       
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-100 uppercase bg-gray-50 dark:bg-gray-500 dark:text-gray-400">
            <tr>
                
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Created at 
                </th>
                <th scope="col" class="px-6 py-3">
                    Updated at
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category )        
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                
                <td class="px-6 py-4">
                    {{ $category->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $category->created_at }}
                </td>
                <td class="px-6 py-4">
                    {{ $category->updated_at }}
                </td>
               
    
                <td class="px-6 py-6">
                    <div class="flex  gap-8 text-base font-semibold">
                        {{-- //{{ route('categorys.edit', $category->id) }} --}}
                        <form method="GET" action="{{ route('categories.edit', $category->id) }}"  >
                            @csrf
                            <button type="submit" class="text-green-500	"> Edit </a>
                        </form> 

                        <form method="POST" action="{{ route('categories.destroy', $category->id) }}"  >
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
        {{-- <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <caption class="p-5 text-lg font-semibold text-left  text-gray-900 bg-white dark:text-white dark:bg-gray-800">
            <div class="flex justify-between">
                categorys
                <a href={{ route('categorys.create') }} class="text-white bg-green-500 hover:bg-green-800 rounded-xl p-2 w-8 text-center  " >
                        +
                </a>
            </div>
        </caption>

        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    category 
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="">Actions</span>
                </th>           
            </tr>
        </thead>
            <tbody>
                @foreach($categorys as $category)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="flex gap-8 text-center">{{ $category->name }} <img src="{{ asset('storage/uploads/'.$category->image) }}" class="rounded-full h-20" /></td>
                    <td>{{ $category->price}}</td>
                    <td > </td>
                    {{-- <td>{{ $category->city->name }}</td>  
                    <td>
                        <button type="button" onclick="confirmDelete({{ $category->id }})">Supprimer</button>
                        {<a href="{{ route('category.edit', ['id' => $category->id]) }}">Modifier</a> 
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table> --}}
    </div>
</x-app-layout>
