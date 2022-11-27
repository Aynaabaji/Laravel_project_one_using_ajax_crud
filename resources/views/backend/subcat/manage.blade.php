@include('backend.product.header')
@include('backend.product.nav')



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>#sl</th>
                        <th>Category Id</th>
                        <th>Category Name</th>
                        <th>Subcategory Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody class="subCadata">
                @php $sl=1; @endphp

                @foreach($cats as $subcat)

                    <tr>
                        <td>{{ $sl }}</td>
                        <td>{{ $subcat->cat_id }}</td>
                        <td>{{ $subcat->catName->name }}</td>
                        <td>{{ $subcat->name}}</td>
                        <td><img height="100px" src="{{ asset('backend/slider/'.$subcat->image) }}" alt="{{ $subcat->name }}"></td>
                        <td>
                            @if($subcat->status == 1)
                                <a href="{{ route('msc',$subcat->id) }}" class=' msc btn btn-info btn-sm'>Active</a>
                            @else
                                <a href="{{ route('msc',$subcat->id) }}" class=' msc btn btn-warning btn-sm'>Inative</a>

                            @endif
                        </td>
                        <td><a href="{{ Route('edtsub',$subcat->id) }}" class="btn btn-sm btn-info">Edit</a></td>
                        <td><a href="{{ Route('dltsub',$subcat->id) }}" class="btn btn-sm btn-danger">Delete</a></td>
                    </tr>

                    @php $sl++; @endphp
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@include('backend.product.footer')