<div class="modal fade" id="updateProductModal{{ $product->product_id }}" tabindex="-1" aria-labelledby="updateProductModalLabel{{ $product->product_id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateProductModalLabel{{ $product->product_id }}">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('products.update', $product->product_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="product_name_{{ $product->product_id }}" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="product_name_{{ $product->product_id }}" name="product_name" value="{{ $product->product_name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="category_id_{{ $product->product_id }}" class="form-label">Category</label>
                        <select class="form-select" id="category_id_{{ $product->product_id }}" name="category_id" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->category_id }}" {{ $product->category_id == $category->category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="product_price_{{ $product->product_id }}" class="form-label">Product Price</label>
                        <input type="number" class="form-control" id="product_price_{{ $product->product_id }}" name="product_price" value="{{ $product->product_price }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="product_stock_{{ $product->product_id }}" class="form-label">Product Stock</label>
                        <input type="number" class="form-control" id="product_stock_{{ $product->product_id }}" name="product_stock" value="{{ $product->product_stock }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="product_image_{{ $product->product_id }}" class="form-label">Product Image</label>
                        <input type="file" class="form-control" id="product_image_{{ $product->product_id }}" name="product_image" accept="image/*">
                        @if($product->product_image)
                            <img src="{{ asset('storage/' . $product->product_image) }}" alt="Current Image" style="max-width: 100px; margin-top: 10px;">
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </div>
            </form>
        </div>
    </div>
</div>