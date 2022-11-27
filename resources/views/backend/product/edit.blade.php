@include('backend.product.header')
@include('backend.product.nav')


<div class="container">
    <h1 class="heading">Edit Product</h1>


    <form action="{{ route('update',$edit->id) }}" method="POST">
        @csrf
        <input class="form-control" type="text" name="name" placeholder="Enter Your Name..." value="{{ $edit->name }}">

        <input class="form-control" type="text" name="email" placeholder="Enter Your email..."
            value="{{ $edit->email }}">

        <input class="form-control" type="text" name="barcode" placeholder="Enter barcode..."
            value="{{ $edit->barcode }}">

        <select class="form-control" name="size">
            <option value="40" @if($edit->size == 40) selected @endif >Small</option>
            <option value="41" @if($edit->size == 41) selected @endif >Medium</option>
            <option value="42" @if($edit->size == 42) selected @endif >Large</option>
            <option value="43" @if($edit->size == 43) selected @endif >Extra Large</option>
            <option value="44" @if($edit->size == 44) selected @endif >Double Extra Large</option>
            <option value="46" @if($edit->size == 46) selected @endif >Tripple Extra Large</option>
        </select>

        <input class="form-control" type="text" name="quantity" placeholder="Enter quantity..."
            value="{{ $edit->quantity }}">

        <input class="form-control" type="color" name="color" requivalue="{{ $edit->color }}">

        <input class="form-control" type="text" name="price" placeholder="Enter price..." value="{{ $edit->price }}">

        <select class="form-control" name="stock">
            <option value="0" @if($edit->stock == 0) selected @endif>Not in stock</option>
            <option value="1" @if($edit->stock == 1) selected @endif>In stock</option>
        </select>

        <input class="form-control" type="text" name="stock_Count" placeholder="Enter stock count..."
            value="{{ $edit->stock_Count }}">

        <input class="submit form-control" name="submit" type="submit" value="Submit">
    </form>
</div>



@include('backend.product.footer')