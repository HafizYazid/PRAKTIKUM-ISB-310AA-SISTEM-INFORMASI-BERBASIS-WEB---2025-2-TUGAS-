@extends('layouts.admin')

@section('content')
<div style="max-width: 600px; margin: 0 auto; padding: 20px; font-family: Arial, sans-serif;">
    <h1 style="color: #333; margin-bottom: 30px;">Edit Product</h1>

    @if($errors->any())
        <div style="padding: 15px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 4px; margin-bottom: 20px;">
            <strong>Validation Error:</strong>
            <ul style="margin: 10px 0 0 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.products.update', $product->id_product) }}" style="background-color: #f8f9fa; padding: 25px; border-radius: 4px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 20px;">
            <label for="nama_product" style="display: block; margin-bottom: 8px; color: #333; font-weight: bold;">Product Name <span style="color: #dc3545;">*</span></label>
            <input type="text" id="nama_product" name="nama_product" value="{{ old('nama_product', $product->nama_product) }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px; box-sizing: border-box;" placeholder="Enter product name" required>
            @error('nama_product')
                <span style="color: #dc3545; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-bottom: 20px;">
            <label for="harga" style="display: block; margin-bottom: 8px; color: #333; font-weight: bold;">Price (Rp) <span style="color: #dc3545;">*</span></label>
            <input type="number" id="harga" name="harga" value="{{ old('harga', $product->harga) }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px; box-sizing: border-box;" placeholder="Enter price" min="0" step="1" required>
            @error('harga')
                <span style="color: #dc3545; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-bottom: 20px;">
            <label for="stok" style="display: block; margin-bottom: 8px; color: #333; font-weight: bold;">Stock <span style="color: #dc3545;">*</span></label>
            <input type="number" id="stok" name="stok" value="{{ old('stok', $product->stok) }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px; box-sizing: border-box;" placeholder="Enter stock quantity" min="0" required>
            @error('stok')
                <span style="color: #dc3545; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span>
            @enderror
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" style="flex: 1; padding: 12px; background-color: #007bff; color: white; border: none; border-radius: 4px; font-weight: bold; cursor: pointer; font-size: 14px;">Update Product</button>
            <a href="{{ route('admin.products.index') }}" style="flex: 1; padding: 12px; background-color: #6c757d; color: white; text-decoration: none; border-radius: 4px; font-weight: bold; text-align: center; font-size: 14px;">Cancel</a>
        </div>
    </form>
</div>
@endsection
