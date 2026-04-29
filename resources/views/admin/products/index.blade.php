@extends('layouts.admin')

@section('content')
<div style="max-width: 1200px; margin: 0 auto; padding: 20px; font-family: Arial, sans-serif;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <h1 style="color: #333; margin: 0;">Product Management</h1>
        <a href="{{ route('admin.products.create') }}" style="display: inline-block; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 4px; font-weight: bold;">
            + Add New Product
        </a>
    </div>

    @if(session('success'))
        <div style="padding: 15px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 4px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    @if($products->isEmpty())
        <div style="text-align: center; padding: 40px; background-color: #f8f9fa; border-radius: 4px;">
            <p style="color: #666; font-size: 16px;">No products found. <a href="{{ route('admin.products.create') }}" style="color: #4CAF50; text-decoration: none;">Create one now</a></p>
        </div>
    @else
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; background-color: white; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                <thead>
                    <tr style="background-color: #f8f9fa; border-bottom: 2px solid #dee2e6;">
                        <th style="padding: 15px; text-align: left; color: #666; font-weight: bold;">ID</th>
                        <th style="padding: 15px; text-align: left; color: #666; font-weight: bold;">Product Name</th>
                        <th style="padding: 15px; text-align: left; color: #666; font-weight: bold;">Price</th>
                        <th style="padding: 15px; text-align: left; color: #666; font-weight: bold;">Stock</th>
                        <th style="padding: 15px; text-align: center; color: #666; font-weight: bold;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr style="border-bottom: 1px solid #dee2e6; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#f8f9fa'" onmouseout="this.style.backgroundColor='white'">
                        <td style="padding: 15px;">{{ $product->id_product }}</td>
                        <td style="padding: 15px;">{{ $product->nama_product }}</td>
                        <td style="padding: 15px;">Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                        <td style="padding: 15px;">
                            <span style="padding: 5px 10px; background-color: {{ $product->stok > 0 ? '#d4edda' : '#f8d7da' }}; color: {{ $product->stok > 0 ? '#155724' : '#721c24' }}; border-radius: 4px; font-size: 12px;">
                                {{ $product->stok > 0 ? $product->stok . ' unit' : 'Out of Stock' }}
                            </span>
                        </td>
                        <td style="padding: 15px; text-align: center;">
                            <a href="{{ route('admin.products.show', $product->id_product) }}" style="padding: 6px 12px; background-color: #17a2b8; color: white; text-decoration: none; border-radius: 3px; margin-right: 5px; display: inline-block; font-size: 12px;">View</a>
                            <a href="{{ route('admin.products.edit', $product->id_product) }}" style="padding: 6px 12px; background-color: #007bff; color: white; text-decoration: none; border-radius: 3px; margin-right: 5px; display: inline-block; font-size: 12px;">Edit</a>
                            <form method="POST" action="{{ route('admin.products.destroy', $product->id_product) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="padding: 6px 12px; background-color: #dc3545; color: white; border: none; border-radius: 3px; cursor: pointer; font-size: 12px;" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
