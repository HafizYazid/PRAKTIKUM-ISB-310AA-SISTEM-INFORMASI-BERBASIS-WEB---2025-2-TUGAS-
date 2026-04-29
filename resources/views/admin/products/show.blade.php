@extends('layouts.admin')

@section('content')
<div style="max-width: 600px; margin: 0 auto; padding: 20px; font-family: Arial, sans-serif;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <h1 style="color: #333; margin: 0;">Product Details</h1>
        <a href="{{ route('admin.products.index') }}" style="padding: 8px 16px; background-color: #6c757d; color: white; text-decoration: none; border-radius: 4px;">← Back</a>
    </div>

    <div style="background-color: #f8f9fa; padding: 25px; border-radius: 4px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <div style="margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px solid #dee2e6;">
            <label style="color: #666; font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Product ID</label>
            <p style="color: #333; font-size: 16px; margin: 5px 0 0 0;">{{ $product->id_product }}</p>
        </div>

        <div style="margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px solid #dee2e6;">
            <label style="color: #666; font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Product Name</label>
            <p style="color: #333; font-size: 16px; margin: 5px 0 0 0; font-weight: bold;">{{ $product->nama_product }}</p>
        </div>

        <div style="margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px solid #dee2e6;">
            <label style="color: #666; font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Price</label>
            <p style="color: #333; font-size: 16px; margin: 5px 0 0 0; font-weight: bold;">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
        </div>

        <div style="margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px solid #dee2e6;">
            <label style="color: #666; font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Stock</label>
            <p style="color: #333; font-size: 16px; margin: 5px 0 0 0;">
                <span style="padding: 5px 10px; background-color: {{ $product->stok > 0 ? '#d4edda' : '#f8d7da' }}; color: {{ $product->stok > 0 ? '#155724' : '#721c24' }}; border-radius: 4px; font-weight: bold;">
                    {{ $product->stok > 0 ? $product->stok . ' unit' : 'Out of Stock' }}
                </span>
            </p>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="color: #666; font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Created At</label>
            <p style="color: #333; font-size: 14px; margin: 5px 0 0 0;">{{ $product->created_at->format('d M Y, H:i') }}</p>
        </div>

        <div style="display: flex; gap: 10px; margin-top: 30px;">
            <a href="{{ route('admin.products.edit', $product->id_product) }}" style="flex: 1; padding: 12px; background-color: #007bff; color: white; text-decoration: none; border-radius: 4px; font-weight: bold; text-align: center;">Edit Product</a>
            <form method="POST" action="{{ route('admin.products.destroy', $product->id_product) }}" style="flex: 1;">
                @csrf
                @method('DELETE')
                <button type="submit" style="width: 100%; padding: 12px; background-color: #dc3545; color: white; border: none; border-radius: 4px; font-weight: bold; cursor: pointer;" onclick="return confirm('Are you sure you want to delete this product?')">Delete Product</button>
            </form>
        </div>
    </div>
</div>
@endsection
