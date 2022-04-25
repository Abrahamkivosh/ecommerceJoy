<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;

class EditProduct extends Component
{
    public $categories;
    public $subcategories;

    public $selectedCat=NULL;

    public function mount(){
        $this->categories = Category::all();
        $this->subcategories=collect();

    }
    public function render()
    {
        return view('livewire.edit-product');
    }
    public function updatedSelectedCat($category){
        if (!is_null($category)) {

        $this->subcategories = SubCategory::where('category_id',$category)->get();
        }
    }
}
