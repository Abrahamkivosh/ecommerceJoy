<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubCategoryRequest $request)
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

            $path = $request->file('image')->storeAs('public/subcategories', $filenameToStore);
            $avatar  = $filenameToStore;
           $data['image'] = $avatar ;
        }

        SubCategory::create($data);
        return back()->with('success','You have successfuly added a new Sub-category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        return view('admin.Subcategory.show',compact('subCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        $categories=Category::all();
        return view('admin.Subcategory.edit',compact('subCategory','categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubCategoryRequest  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubCategoryRequest $request, SubCategory $subCategory)
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

            $path = $request->file('image')->storeAs('public/subcategories', $filenameToStore);
            $avatar  = $filenameToStore;
           $data['image'] = $avatar ;
        }

        $subCategory->update($data);
        return back()->with('success','You have successfuly updated the Sub-category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();

        if($subCategory){
            return back()->with('success','You have successfully deleted the record');
        }
        else{
            return back()->with('error','An error occured, please try again or contact the manager!');
        }
    }
}
