@include('backend.product.header')
@include('backend.product.nav')



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>#sl</th>
                        <th>Item Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody class="itemshow">
                @php $srl = 1; @endphp
                
                @foreach($items as $item)
                <tr>
                    <td>{{$srl}}</td>
                    <td>{{$item->name}}</td>
                    <td><img width="220px" src="{{ asset('backend/items/'.$item->image) }}" alt="img"></td>
                    <td>@if($item->status == 1)
                            <a href="{{ route('itemStatusToggle',$item->id) }}" class="btn btn-sm btn-info">Active</a>
                        @else
                            <a href="{{ route('itemStatusToggle',$item->id) }}" class="btn btn-sm btn-warning">Inactive</a>
                        @endif
                    </td>
                    <td><a href="{{ route('editItem',$item->id) }}" class="btn btn-sm btn-secondary">View</a></td>
                    <td><a href="{{ route('dltitm',$item->id) }}" class="btn btn-sm btn-danger">Delete</a></td>
                </td>

                @php $srl++; @endphp
                @endforeach
                </tbody>
                
            </table>
        </div>
    </div>
</div>



@include('backend.product.footer')