@include('backend.product.header')
@include('backend.product.nav')


<div class="container">
    <a data-bs-toggle="modal" data-bs-target="#ad" class="btn btn-primary mt-5">Add Products</a>
    <a href="{{ route('home') }}" class="btn btn-info mt-5">Add
        Products</a>
    <table class="table">
        <tr>
            <th>#sl</th>
            <th>Name</th>
            <th>Email</th>
            <th>Barcode</th>
            <th>Size</th>
            <th>Quantity</th>
            <th>Color</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Stock_Count</th>
            <th colspan="2">Action</th>
        </tr>
        <?php $sl = 1; ?>
        @foreach($jinish as $data)
        <tr>
            <td>{{ $sl }}</td>
            <td>{{ $data->name }}</td>
            <td>{{ $data->email }}</td>
            <td>{{ $data->barcode }}</td>
            <td>{{ $data->size }}</td>
            <td>{{ $data->quantity }}</td>
            <td>{{ $data->color }}</td>
            <td>{{ $data->price }}</td>
            <td>@if($data->stock == 1) <a href="{{ route('stockToggle',$data->id) }}" class="btn btn-info">In Stock</a> @else <a href="{{ route('stockToggle',$data->id) }}" class="btn btn-warning">Not in stock </a> @endif</td>
            <td>{{ $data->stock_Count }}</td>
            <td><a class="btn btn-info" href="{{ route('edit',$data->id) }}">Edit</a></td>
            <td><a data-bs-toggle="modal" data-bs-target="#del" class="btn btn-danger">Delete</a></td>
        </tr>
        <?php $sl++; ?>


        <div class="modal" tabindex="-1" id="del">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>You sure wanna delete?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <a href="{{ route('delete',$data->id) }}" class="btn btn-primary">Confirm</a>
                    </div>
                </div>
            </div>
        </div>




        @endforeach
    </table>
    
    @include('backend.product.addModa')

</div>


@include('backend.product.footer')