@extends('layouts.main')

@section('title', 'Produk Gym')

@section('content')
<div class="page-wrap">
    <div class="container">

        {{-- Header --}}
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-5 gap-3">
            <div>
                <h1 style="font-size:1.6rem; font-weight:800; margin-bottom:4px;">Produk Gym</h1>
                <p class="text-muted mb-0" style="font-size:0.875rem;">
                    Temukan produk gym terbaik untuk mendukung latihan Anda
                    @if(auth()->user()->isAdmin())
                        — <span style="color:#16a34a; font-weight:600;">Mode Admin aktif</span>
                    @endif
                </p>
            </div>
            @if(auth()->user()->isAdmin())
                <a href="{{ route('products.create') }}"
                   class="btn-primary-custom"
                   style="display:inline-block; text-decoration:none; font-size:0.875rem;"
                   id="btn-add-product">
                    + Tambah Produk
                </a>
            @endif
        </div>

        {{-- Products by Category --}}
        @forelse($products->groupBy('category.category_name') as $categoryName => $categoryProducts)
        <div class="mb-5">
            <div class="section-divider">
                <h3>{{ $categoryName ?? 'Lainnya' }}</h3>
                <hr>
                <span>{{ $categoryProducts->count() }} produk</span>
            </div>

            <div class="row g-3">
                @foreach($categoryProducts as $product)
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="product-card">
                        <div class="product-img-wrap">
                            @if($product->product_image)
                                <img src="{{ asset('storage/' . $product->product_image) }}"
                                     alt="{{ $product->product_name }}">
                            @else
                                <span class="product-no-img bi bi-image"></span>
                            @endif
                        </div>
                        <div class="p-3">
                            <div class="mb-1" style="font-size:0.7rem; color:#9ca3af; font-weight:600; text-transform:uppercase; letter-spacing:0.5px;">
                                {{ $product->brand->brand_name ?? '-' }}
                            </div>
                            <div style="font-weight:600; font-size:0.9rem; color:#111; margin-bottom:6px; line-height:1.3;">
                                {{ $product->product_name }}
                            </div>
                            <div style="font-weight:700; font-size:0.95rem; color:#dc2626; margin-bottom:8px;">
                                Rp {{ number_format($product->product_price, 0, ',', '.') }}
                            </div>
                            <div style="font-size:0.8rem;">
                                Stok:
                                @if($product->product_stock == 0)
                                    <span class="stock-out">Habis</span>
                                @elseif($product->product_stock < 10)
                                    <span class="stock-low">{{ $product->product_stock }} (Sedikit)</span>
                                @else
                                    <span class="stock-ok">{{ $product->product_stock }}</span>
                                @endif
                            </div>
                        </div>

                        @if(auth()->user()->isAdmin())
                        <div class="px-3 pb-3 d-flex gap-2">
                            <a href="{{ route('products.edit', $product->product_id) }}"
                               class="btn btn-sm btn-outline-secondary rounded flex-fill"
                               style="font-size:0.8rem;"
                               id="btn-edit-product-{{ $product->product_id }}">
                                Edit
                            </a>
                            <form action="{{ route('products.destroy', $product->product_id) }}" method="POST"
                                  class="flex-fill"
                                  onsubmit="return confirm('Hapus produk {{ addslashes($product->product_name) }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn btn-sm btn-outline-danger rounded w-100"
                                        style="font-size:0.8rem;"
                                        id="btn-delete-product-{{ $product->product_id }}">
                                    Hapus
                                </button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @empty
        <div class="text-center py-5">
            <p class="text-muted mb-3">Belum ada produk yang tersedia.</p>
            @if(auth()->user()->isAdmin())
                <a href="{{ route('products.create') }}" class="btn-primary-custom" style="display:inline-block; text-decoration:none;">
                    + Tambah Produk Pertama
                </a>
            @endif
        </div>
        @endforelse

    </div>
</div>
@endsection
