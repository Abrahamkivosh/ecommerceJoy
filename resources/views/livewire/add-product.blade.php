<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Category <span style="color: red">*</span></label>
            <select wire:model="selectedCategory" name="category_id"  class="form-control select2" style="width: 100%">
                <option value="" selected> <span></span> Select Category</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <!-- /.form-group -->

    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>SubCategory <span style="color: red">*</span></label>
            <select class="form-control select2" name="sub_category_id" style="width: 100%">
                @foreach ($subcategories as $subcategory)
                <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                @endforeach
            </select>
        </div>
        <!-- /.form-group -->
    </div>
</div>
