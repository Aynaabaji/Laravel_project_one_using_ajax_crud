@include('backend.product.header')
@include('backend.product.nav')

<div class="container">
    <div class="row">
        <div class="col-md-12 border border-info rounded pb-2">
            <h1>Add Sub Category!</h1>
            <form action="{{ Route('insertmul') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input class="subcat_name form-control mt-2" type="text" name="name" placeholder="Enter Item Name..." required>
                </div>
                <div class="form-group">
                    <input class="sin_img form-control mt-2" type="file" name="images" placeholder="Choose image..." required>
                </div>
                <div class="form-group">
                    <input class="form-control mt-2" type="file" name="gallaries[]" required multiple>
                </div>
                <div class="form-group">
                    <select class="item_status form-control mt-2" name="status">
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






        

        
