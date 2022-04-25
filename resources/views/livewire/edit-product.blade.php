<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Category</label>
            <select wire:model="selectedCat" name="category_id"  class="form-control select2" style="width: 100%">
                <option value="" selected>Select Category</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <!-- /.form-group -->

    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>SubCategory</label>
            <select class="form-control select2" name="sub_category_id" style="width: 100%">
                @foreach ($subcategories as $subcategory)
                <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                @endforeach
            </select>
        </div>
        <!-- /.form-group -->
    </div>
</div>
