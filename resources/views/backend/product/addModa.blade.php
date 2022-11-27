<div id="ad" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('form') }}" method="POST">
                    @csrf
                    <input class="form-control" type="text" name="name" placeholder="Enter Your Name..." required>

                    <input class="form-control" type="text" name="email" placeholder="Enter Your email..." required>

                    <input class="form-control" type="text" name="barcode" placeholder="Enter barcode..." required>

                    <select class="form-control" name="size">
                        <option value="40" selected>Small</option>
                        <option value="41">Medium</option>
                        <option value="42">Large</option>
                        <option value="43">Extra Large</option>
                        <option value="44">Double Extra Large</option>
                        <option value="46">Tripple Extra Large</option>
                    </select>

                    <input class="form-control" type="text" name="quantity" placeholder="Enter quantity..." required>

                    <input class="form-control" type="color" name="color" required>

                    <input class="form-control" type="text" name="price" placeholder="Enter price..." required>

                    <select class="form-control" name="stock">
                        <option value="0" selected>Not in stock</option>
                        <option value="1">In stock</option>
                    </select>

                    <input class="form-control" type="text" name="stock_Count" placeholder="Enter stock count..."
                        required>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>