<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
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

            $path = $request->file('image')->storeAs('public/categories', $filenameToStore);
            $avatar  = $filenameToStore;
           $data['image'] = $avatar ;
        }

        Category::create($data);
        return back()->with('success','You have successfuly added a new category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {

        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
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

            $path = $request->file('image')->storeAs('public/categories', $filenameToStore);
            $avatar  = $filenameToStore;
           $data['image'] = $avatar ;
        }

        $category->update($data);
        return back()->with('success','You have successfuly updated the category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        if($category){
            return back()->with('success','You have successfully deleted the record');
        }
        else{
            return back()->with('error','An error occured, please try again or contact the manager!');
        }
    }
}
