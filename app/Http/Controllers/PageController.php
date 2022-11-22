<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Ramsey\Uuid\Nonstandard\Uuid;
use Illuminate\Support\Facades\Auth;
use App\Http\Payment\Money as PaymentMoney;
use App\Models\Review;

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
    public function product(Product $product)
    {
        # code...
        $categories = Category::latest()->paginate(4);
        return view('client.single',compact('product','categories'));
    }
    public function cart()
    {
        # code...
        $categories = Category::latest()->paginate(4);
        return view('client.cart',compact('categories')) ;
    }
    public function addToCart(Request $request)
    {
      $cart =  \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        $request->session()->put('cart', \Cart::getContent()->toArray());

        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->back();
    }
    public function checkout()
    {
        # code...
        $categories = Category::latest()->paginate(4);
        return view('client.checkout',compact('categories')) ;
    }
    public function checkoutPay( Request $request , PaymentMoney $mpesa )
    {
       return  $mpesa->lipaNaMPesaOnlineAPI( "0707585566", "10") ;

        $cartCollection = \Cart::getContent()->toArray();
        $user = Auth::user() ;
       return  $cartCollection ;

        //  $orders =  $user->orders()->create($request->all()) ;
        $items = \Cart::getContent();
        //  $orders->order_details()->create() ;
        return response( $items) ;
    }
    public function reviewAdd( Request $request , Product $product )
    {
        # code...
        if (!Auth::check()) {
            # code...
            $request->session()->flash('error', "Please login to give review");
        }
        $user = Auth::user() ;


        $review =Review::create([
            'product_id'=>$product->id ,
            'rating'=> $request->rating ,
            'review'=> $request->review ,
            'user_id'=> $user->id
        ]);

            $request->session()->flash('success', "Review Added");
            return back();
    }

    // public function footerwor(){
    //     $categories=Category::all();
    //     return view('layouts.client.app',compact('categories'));
    // }
}
