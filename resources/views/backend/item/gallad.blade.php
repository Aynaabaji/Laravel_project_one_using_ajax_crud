@include('backend.product.header')
@include('backend.product.nav')

<div class="container">
    <div class="row">
        <div class="col-md-12 border border-info rounded pb-2">
            <h1>Add Pics to Gallary</h1>
            <form action="{{ route('insertgal',$id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input class="form-control mt-2" type="file" name="pics[]" required multiple>
                </div>
                <button class="save btn btn-success mt-2">Save</button>
            </form>
        </div>
    </div>
</div>




@include('backend.product.footer')






        

        
