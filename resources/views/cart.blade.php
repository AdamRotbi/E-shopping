<x-app-layout>
    <table class="w-full text-gray-900 dark:text-gray-100">
        <thead>
            <tr class="bg-gray-200 dark:bg-gray-800">
                <th class="px-4 py-2">Image</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Quantity</th>
                <th class="px-4 py-2">Price</th>
                <th class="px-4 py-2">Total</th>
                <th class="px-4 py-2"></th>
            </tr>
        </thead>
        <tbody>
    @php $total = 0 @endphp
    @if(session('cart'))
        @foreach(session('cart') as $id => $details)
            @php 
                $subtotal = $details['price'] * $details['quantity'];
                $total += $subtotal;
            @endphp
            <tr rowId="{{ $id }}" class="bg-white dark:bg-gray-700">
                <td class="px-4 py-2 text-center">
                    <img src="{{ asset('storage/uploads/' . $details['image']) }}" alt="{{ $details['image']}}" class="h-24 w-24 object-cover rounded-t-lg">                            
                </td>
                <td class="px-4 py-2 text-center"> <h4 class="font-semibold">{{ $details['name'] }}</h4></td>
                <td class="px-4 py-2 text-center">{{ $details['quantity'] }}</td>
                <td class="px-4 py-2 text-center">${{ $details['price'] }}</td>
                <td class="px-4 py-2 text-center">${{ $subtotal }}</td>
                <td class="px-4 py-2 text-center">
                    <button class="text-red-500 dark:text-red-300 hover:text-red-700 dark:hover:text-red-400 delete-products">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            </tr>
        @endforeach
    @endif
</tbody>
<tfoot>
    {{-- <tr>
        <td colspan="4" class="text-right px-4 py-2">Total:</td>
        <td class="text-center px-4 py-2">${{ $total }}</td>
        <td class="px-4 py-2"></td>
    </tr> --}}
    <tr>
        <td colspan="6" class="text-right px-4 py-2">
            <a href="{{ url('/dashboard') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Continue Shopping</a>
            {{-- <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Checkout</button> --}}
            <a class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600" href="{{ route('email') }}">Checkout</a>
        </td>
    </tr>
</tfoot>

         
    </table>
</x-app-layout>

  
@section('scripts')
<script type="text/javascript">
  
    $(".edit-cart-info").change(function (e) {
        e.preventDefault();
        var ele = $(this);
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("rowId"), 
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
  
    $(".delete-products").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        if(confirm("Do you really want to delete?")) {
            $.ajax({
                url: '{{ route('remove.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("rowId")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
  
</script>
@endsection