<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {   
        $categories = Category::orderBy('name')->get();
        $products = Product::with('category')->get();
        return view('products', compact('products', 'categories'));
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()     {
            $categories = Category::orderBy('name')->get();
            return view('products.create', compact('categories'));
    }

    

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'price' => 'required|numeric',
        'category_id' => 'required'
        // 'category_id' => 'required|exists:categories,id',
    ]);

    $product = new Product();
    $product->name = $request->name;
    $product->price = $request->price;
    $product->category_id = $validatedData['category_id'];

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time() . '_' . $image->getClientOriginalName();
        $path = $image->storeAs('public/uploads', $filename);
        $product->image = $filename;
    }

    $product->save();

    return redirect()->route('products.index')->with('success', 'Product created successfully');
}
    /**
     * Store a newly created resource in storage.
     */
   public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'price' => 'required|numeric',
        // 'category_id' => 'required|exists:categories,id',
    ]);
    
    $product = Product::find($id);
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time() . '_' . $image->getClientOriginalName();
        $path = $image->storeAs('public/uploads', $filename);
        $image = $filename;
    }

    $product->update([
        'name' => $request->name,
        'image' => $image,
        'price' => $request->price,
    ]);

    return redirect()->route('products.index')->with('success', 'Product created successfully');
}
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        
        return redirect()->route('products.index')->with('success', 'Product created successfully');

    }
    // Search
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $products = Product::where('name', 'like', '%' . $searchTerm . '%')->get();
        
        return view('dashboard', compact('products'));
    }
    public function searchByPrice(Request $request)
    {
        $minPrice = $request->input('minPrice');
        $maxPrice = $request->input('maxPrice');

        $products = Product::whereBetween('price', [$minPrice, $maxPrice])->get();

    
        return view('dashboard', ['products' => $products]);
    }
    

    // Cart => 
    public function cart()
    {
        $products = Product::with('category')->get();
        $categories = Category::orderBy('name')->get();
        return view('cart', compact('products', 'categories'));
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);  
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
        
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
            
        }
    }

    public function removeCart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}   