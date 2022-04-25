<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $subcategories=SubCategory::all();
        return view('admin.products.create',compact('categories','subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $data=$request->validated();
        if (file_exists($request->file('image'))) {
            // Get filename with extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();



            // Get extension
            $extension = $request->file('image')->getClientOriginalExtension();

            // Create new filename
            $filenameToStore = (string) Str::uuid() . '_' . time() . '.' . $extension;

            // Uplaod image

            $path = $request->file('image')->storeAs('public/products', $filenameToStore);
            $avatar  = $filenameToStore;
           $data['image'] = $avatar ;
        }

        Product::create($data);
        return back()->with('success','You have successfuly added a product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $subcategories=SubCategory::all();
        return view('admin.products.edit',compact('categories','subcategories','product'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data=$request->validated();
        if (file_exists($request->file('image'))) {
            // Get filename with extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();



            // Get extension
            $extension = $request->file('image')->getClientOriginalExtension();

            // Create new filename
            $filenameToStore = (string) Str::uuid() . '_' . time() . '.' . $extension;

            // Uplaod image

            $path = $request->file('image')->storeAs('public/products', $filenameToStore);
            $avatar  = $filenameToStore;
           $data['image'] = $avatar ;
        }

        $product->update($data);
        return back()->with('success','You have successfuly updated the Product details');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();


        if($product){
            return back()->with('success','You have successfully deleted the record');
        }
        else{
            return back()->with('error','An error occured, please try again or contact the admin!');
        }


    }
}
