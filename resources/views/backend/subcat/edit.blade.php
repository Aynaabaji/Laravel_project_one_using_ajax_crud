@include('backend.product.header')
@include('backend.product.nav')

<div class="container">
    <div class="row">
        <div class="col-md-12 border border-info rounded pb-2">
            <h1>Edit Sub Category!</h1>
            <form action="{{ Route('udtsub',$subcat->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <select name="cat_id" class="cate_id form-control">
                        @foreach($cats as $cat)
                            <option value="{{ $cat->id }}" @if($subcat->cat_id == $cat->id) selected @endif>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input class="subcat_name form-control mt-2" type="text" name="name" placeholder="Enter Category Name..." value = "{{ $subcat->name }}" required>
                </div>
                <div class="form-group">
                    <img src="{{ asset('backend/slider/'.$subcat->image) }}" alt="img">
                </div>
                <div class="form-group">
                    <input class="subcat_desc form-control mt-2" type="file" name="image" placeholder="Choose image..." value = "{{ $subcat->image }}" required>
                </div>
                <div class="form-group">
                    <select class="subcat_status form-control mt-2" name="status">
                        <option value="1" 
                        @if($subcat->status == 1)
                        selected
                        @endif
                        >Active</option>
                        <option value="0"
                        @if($subcat->status == 0)
                        selected
                        @endif
                        >Inactive</option>
                    </select>
                </div>
                <button class="save btn btn-success mt-2">Save</button>
                <button class="update btn btn-success mt-2" style="display:none">Update</button>
            </form>
        </div>
    </div>
</div>




@include('backend.product.footer')






        

        
