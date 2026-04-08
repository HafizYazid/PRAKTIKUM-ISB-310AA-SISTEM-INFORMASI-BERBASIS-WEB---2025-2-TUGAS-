@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="max-w-4xl mx-auto">
        <div class="card">
            <div class="card-header flex justify-between items-center">
                <h1 class="text-3xl font-bold text-gray-900">{{ $product->name }}</h1>
                <div class="space-x-2">
                    <a href="{{ route('admin.products.edit', $product->id_product) }}" class="btn-primary">Edit</a>
                    <a href="{{ route('admin.products.index') }}" class="btn-secondary">Back to List</a>
                </div>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900 mb-4">Product Details</h2>
                        <div class="space-y-3">
                            <div>
                                <span class="font-medium text-gray-600">Name:</span>
                                <span class="text-gray-900">{{ $product->name }}</span>
                            </div>
                            <div>
                                <span class="font-medium text-gray-600">Price:</span>
                                <span class="text-gray-900">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            </div>
                            <div>
                                <span class="font-medium text-gray-600">Stock:</span>
                                <span class="text-gray-900">{{ $product->stock }}</span>
                            </div>
                            <div>
                                <span class="font-medium text-gray-600">Created:</span>
                                <span class="text-gray-900">{{ $product->created_at->format('d M Y, H:i') }}</span>
                            </div>
                            <div>
                                <span class="font-medium text-gray-600">Updated:</span>
                                <span class="text-gray-900">{{ $product->updated_at->format('d M Y, H:i') }}</span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h2 class="text-xl font-semibold text-gray-900 mb-4">Categories</h2>
                        <div class="flex flex-wrap gap-2">
                            @foreach($product->categories as $category)
                                <span class="badge badge-blue">
                                    {{ $category->name }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Description</h2>
                    <div class="bg-gray-50 p-4 rounded-md">
                        <p class="text-gray-700 whitespace-pre-line">{{ $product->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection