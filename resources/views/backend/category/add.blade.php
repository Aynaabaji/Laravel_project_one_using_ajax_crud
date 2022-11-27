@include('backend.product.header')
@include('backend.product.nav')

<div class="container">
    <div class="row">
        <div class="col-md-4 border border-info rounded pb-2">
            <h1>Add New Category!</h1>
            <div class="form-group">
                <input class="cat_name form-control mt-2" type="text" name="name" placeholder="Enter Category Name..." required>
            </div>
            <div class="form-group">
                <input class="cat_desc form-control mt-2" type="text" name="desc" placeholder="Enter description..." required>
            </div>
            <div class="form-group">
                <select class="cat_status form-control mt-2" name="status">
                    <option value="1" selected>Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
            <button class="save btn btn-success mt-2">Save</button>
            <button class="update btn btn-success mt-2" style="display:none">Update</button>
        </div>
        <div class="col-md-8">
        <table class="table">
                <thead>
                    <tr>
                        <th>#sl</th>
                        <th>Category name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody class="tdata">
                    
                </tbody>
            </table>
        </div>
    </div>
</div>




@include('backend.product.footer')






        

        
