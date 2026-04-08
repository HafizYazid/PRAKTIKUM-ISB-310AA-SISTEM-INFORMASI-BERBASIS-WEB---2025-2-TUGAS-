@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <h1 class="section-title">Featured Products</h1>

        <!-- Filters and Search -->
        <div class="filters">
            <div class="search-box">
                <input type="text" placeholder="Search products..." id="search-input">
            </div>
            <select class="filter-select" id="category-filter">
                <option value="">All Categories</option>
                <option value="electronics">Electronics</option>
                <option value="gaming">Gaming</option>
                <option value="accessories">Accessories</option>
            </select>
            <select class="filter-select" id="sort-filter">
                <option value="">Sort By</option>
                <option value="price-asc">Price: Low to High</option>
                <option value="price-desc">Price: High to Low</option>
                <option value="name">Name: A to Z</option>
            </select>
        </div>

        <!-- Products Grid -->
        <div id="products" class="products-grid">
            @if ($products->count() > 0)
                @foreach ($products as $product)
                    <div class="product-card" data-categories="{{ $product->categories->pluck('name')->join(' ') }}">
                        <div class="product-image">📦</div>
                        <div class="product-info">
                            <h3 class="product-name">{{ $product->name }}</h3>
                            <p class="product-description">{{ $product->description }}</p>
                            <div class="product-meta">
                                <span class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                <span class="product-stock @if ($product->stock < 5) low @endif">
                                    {{ $product->stock > 0 ? 'Stock: ' . $product->stock : 'Out of Stock' }}
                                </span>
                            </div>
                            @if ($product->stock > 0)
                                <form method="POST" action="{{ route('cart.add', $product->id_product) }}" class="inline">
                                    @csrf
                                    <button type="submit" class="btn-add-cart">
                                        Add to Cart
                                    </button>
                                </form>
                            @else
                                <button class="btn-add-cart" disabled>
                                    Out of Stock
                                </button>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <div class="empty-state" style="grid-column: 1 / -1;">
                    <div class="empty-state-icon">📦</div>
                    <h2 class="empty-state-title">No Products Available</h2>
                    <p class="empty-state-text">Products will be available soon. Check back later!</p>
                </div>
            @endif
        </div>
    </div>
@endsection
