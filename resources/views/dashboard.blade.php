{{-- <x-app-layout>
<!DOCTYPE html>
<html>
<head>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"> 
</head>
<body>
  
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-12 main-section">
            <div class="dropdown">
                <button type="button" class="btn btn-info" data-toggle="dropdown">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                </button>
                <div class="dropdown-menu">
                    <div class="row total-header-section">
                        <div class="col-lg-6 col-sm-6 col-6">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                        </div>
                        @php $total = 0 @endphp
                        @foreach((array) session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                        @endforeach
                        <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                            <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                        </div>
                    </div>
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            <div class="row cart-detail">
                                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                    <img src="{{ $details['image'] }}" />
                                </div>
                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                    <p>{{ $details['name'] }}</p>
                                    <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                            <a href="{{ route('cart') }}" class="btn btn-primary btn-block">View all</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  
<br/>
<div class="container">
  
    @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
    @endif
  
    @yield('content')
</div>
  
@yield('scripts')
     
</body>
</html>
</x-app-layout> --}}
{{-- <x-app-layout>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    
    <script src="{{ mix('js/app.js') }}" defer></script>
    
</head>
<body class="bg-gray-100">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">
        <div class="flex justify-between items-center">
            <button type="button" class="flex items-center text-blue-500">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <span class="ml-2">Cart</span>
                <span class="ml-1 text-white bg-red-500 rounded-full px-2">{{ count((array) session('cart')) }}</span>
            </button>
            @php $total = 0 @endphp
            @foreach((array) session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                @endforeach
            <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                        <p>Total: <span class="text-info">$ {{ $total }}</span></p>
            </div>
        </div>
    </div>
    <div class="container mx-auto mt-4">
        @if(session('success'))
            <div class="bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md" role="alert">
            <div class="flex">
                <div class="py-1">
                    <svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10.002 10.002 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM6.7 9.29l2.3 2.3 4.6-4.6 1.4 1.42-6 6-3.7-3.7 1.4-1.42z"/></svg>
                </div>
                <div>
                    <
                <p class="font-bold">{{ session('success') }}</p>
                </div>
              </div>
            </div>
        @endif
        @yield('content')
    </div>
    @yield('scripts')
</body>
</html>
</x-app-layout> --}}
<x-app-layout>
    <h1 class="text-3xl">Welcome!</h1>
    <div class="flex justify-end space-x-4">
        <form class="d-flex" action="{{ route('search') }}" method="GET">
            <input class="form-control me-2 border rounded px-2" type="text" name="search" placeholder="Name" aria-label="Search">
            <button class="btn btn-outline-primary bg-blue-500 text-white px-4 py-2 rounded" type="submit">Rechercher</button>
        </form>
        <form class="d-flex" action="{{ route('searchByPrice') }}" method="GET">
            <input class="form-control me-2 border rounded px-2" type="text" name="minPrice" placeholder="Prix minimum">
            <input class="form-control me-2 border rounded px-2" type="text" name="maxPrice" placeholder="Prix maximum">
            <button class="btn btn-outline-primary bg-blue-500 text-white px-4 py-2 rounded" type="submit">Rechercher</button>
        </form>
    </div>
</x-app-layout>