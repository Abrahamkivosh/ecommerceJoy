<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        # code...
        $categories = Category::latest()->paginate(4);
        $subCategories = SubCategory::with('products')->paginate(3) ;
        return view('client.welcome',compact('categories','subCategories')) ;
    }
    public function categories()
    {
        # code...
        return view('client.Categories') ;
    }
    public function showCategory(Category $category)
    {
        # code...
        return $category ;
    }
    public function cart()
    {
        # code...
        return view('client.cart') ;
    }
    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->back();
    }
}
