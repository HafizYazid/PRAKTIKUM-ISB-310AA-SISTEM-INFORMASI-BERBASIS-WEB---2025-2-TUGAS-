@extends('layouts.main')

@section('title', 'Products')

@section('content')
    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">Products</h1>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createProductModal">Add Product</button>
        </div>

        <div class="row">
            @forelse($products ?? [] as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @php
                            $imageUrl = 'https://via.placeholder.com/400x300?text=No+Image';
                            if ($product->product_image) {
                                if (filter_var($product->product_image, FILTER_VALIDATE_URL)) {
                                    $imageUrl = $product->product_image;
                                } elseif (strpos($product->product_image, 'assets/') === 0 || strpos($product->product_image, 'public/') === 0) {
                                    $imageUrl = asset($product->product_image);
                                } else {
                                    $imageUrl = asset('storage/' . ltrim($product->product_image, '/'));
                                }
                            }
                        @endphp
                        <img src="{{ $imageUrl }}" class="card-img-top" alt="{{ $product->product_name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->product_name }}</h5>
                            <p class="card-text">Price: Rp {{ number_format($product->product_price, 0, ',', '.') }}</p>
                            <p class="card-text">Stock: {{ $product->product_stock }}</p>
                            <p class="card-text">Category: {{ optional($product->category)->category_name ?? 'Unknown' }}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <button class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#updateProductModal{{ $product->product_id }}">Edit</button>
                            <form action="{{ route('products.destroy', $product->product_id) }}" method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this product?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                @include('modal.updateProduct', ['product' => $product, 'categories' => $categories ?? []])
            @empty
                <div class="col-12">
                    <p class="text-center">No products found.</p>
                </div>
            @endforelse
        </div>
    </div>

    @include('modal.createProduct', ['categories' => $categories ?? []])
@endsection


