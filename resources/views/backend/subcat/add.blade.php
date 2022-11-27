@include('backend.product.header')
@include('backend.product.nav')

<div class="container">
    <div class="row">
        <div class="col-md-12 border border-info rounded pb-2">
            <h1>Add Sub Category!</h1>
            <form action="{{ Route('addImg') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                <select name="cat_id" class="cate_id form-control">
                        @foreach($cats as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input class="subcat_name form-control mt-2" type="text" name="name" placeholder="Enter Category Name..." required>
                </div>
                <div class="form-group">
                    <input class="subcat_desc form-control mt-2" type="file" name="image" placeholder="Choose image..." required>
                </div>
                <div class="form-group">
                    <select class="subcat_status form-control mt-2" name="status">
                        <option value="1" selected>Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <button class="save btn btn-success mt-2">Save</button>
                <button class="update btn btn-success mt-2" style="display:none">Update</button>
            </form>
        </div>
    </div>
</div>




@include('backend.product.footer')






        

        
