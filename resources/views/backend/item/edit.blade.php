@include('backend.product.header')
@include('backend.product.nav')

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h1>Edit Item</h1>
            <form action="{{ Route('updatesin',$item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input class="subcat_name form-control mt-2" type="text" value="{{ $item->name }}" name="name" placeholder="Enter Item Name..." required>
                </div>
                <img src="{{ asset('backend/items/'.$item->image)}}" alt="img">
                <div class="form-group">
                    <input class="sin_img form-control mt-2" type="file" name="images" placeholder="Choose image..." required>
                </div>

                <div class="form-group">
                    <select class="item_status form-control mt-2" name="status">
                        <option value="1" @if($item->status == 1) selected @endif>Active</option>
                        <option value="0" @if($item->status == 0) selected @endif>Inactive</option>
                    </select>
                </div>
                <button class="update btn btn-success mt-2">Update</button>
            </form>
        </div>






        <div class="col-md-8">
            <?php
            foreach($gallaries as $gallary){
                $via = $gallary->item_id;
            }
            ?>
            <a href="{{ route('addtogal',$via) }}" class="galadd mt-3 btn btn-md btn-info">Add Images to gallary</a>
            <a href="{{ route('itemshow') }}" class="galadd mt-3 btn btn-md btn-info">Manage Items</a>
            <div class="gal_grid">
                @foreach($gallaries as $gallary)
                <div class="gallary_item">
                    <img class="gal_item" src="{{ asset('backend/gallary/'.$gallary->images) }}" alt="gallary">
                    <div class="dltbtn">
                        <a href="{{ route('dltgal',$gallary->id) }}">
                            <i class="dlticon fa-solid fa-trash"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@include('backend.product.footer')