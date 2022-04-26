<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        # code...
        $categories = Category::latest()->paginate(4);
        $subCategories = SubCategory::with('products')->paginate(3) ;
        $topProducts = Product::latest()->take(4)->get();
        return view('client.welcome',compact('categories','subCategories','topProducts')) ;
    }
    public function categories(Request $request)
    {
        # code...
        $categories = Category::latest()->withCount('products')->get();
        $products = Product::query() ;
        if ( $request->has('category') && !empty($request->category) ) {

           $category = Category::find($request->category) ;
           $ids = $category->products->pluck('id') ;
            $products  = $products->whereIn('id',$ids);
        }
        $products =  $products->latest()->simplePaginate(20) ;


        return view('client.Categories',compact('categories','products'));
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
