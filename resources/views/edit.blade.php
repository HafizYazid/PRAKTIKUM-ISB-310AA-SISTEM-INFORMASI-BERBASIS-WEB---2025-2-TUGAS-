@extends('layouts.admin')

@section('content')
<div class="admin-container">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">Edit Product</h1>

        <form method="POST" action="{{ route('admin.products.update', $product->id_product) }}" class="card p-6">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required class="form-input">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" rows="4" required class="form-input">{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="price" class="form-label">Price</label>
                <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" step="0.01" min="0" required class="form-input">
                @error('price')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" min="0" required class="form-input">
                @error('stock')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="form-label">Categories</label>
                <div class="categories-grid">
                    @foreach($categories as $category)
                        <label class="category-checkbox">
                            <input type="checkbox" name="categories[]" value="{{ $category->id_category }}"
                                   {{ in_array($category->id_category, old('categories', $product->categories->pluck('id_category')->toArray())) ? 'checked' : '' }}
                                   class="category-input">
                            <span class="category-label">{{ $category->name }}</span>
                        </label>
                    @endforeach
                </div>
                @error('categories')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.products.index') }}" class="btn-secondary">
                    Cancel
                </a>
                <button type="submit" class="btn-primary">
                    Update Product
                </button>
            </div>
        </form>
    </div>
</div>
@endsection