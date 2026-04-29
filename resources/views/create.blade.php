@extends('layouts.admin')

@section('content')
<div class="admin-container">
    <div class="admin-form-container">
        <h1 class="admin-page-title">Add New Product</h1>

        <form method="POST" action="{{ route('products.store') }}" class="admin-card">
            @csrf

            <div class="form-group">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required class="form-input">
                @error('name')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

             <div class="form-group">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" name="stock" id="stock" value="{{ old('stock') }}" step="1" min="0" required class="form-input">
                @error('stock')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="price" class="form-label">Price</label>
                <input type="number" name="price" id="price" value="{{ old('price') }}" step="0.01" min="0" required class="form-input">
                @error('price')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-actions">
                <a href="{{ route('products.index') }}" class="btn-secondary">Cancel</a>
                <button type="submit" class="btn-primary">Create Product</button>
            </div>
        </form>
    </div>
</div>
@endsection