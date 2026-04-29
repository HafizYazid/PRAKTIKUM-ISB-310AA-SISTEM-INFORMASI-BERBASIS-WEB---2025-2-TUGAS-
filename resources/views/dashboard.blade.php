@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div style="max-width: 1200px; margin: 0 auto; padding: 20px; font-family: Arial, sans-serif;">
    <h1 style="color: #333;">Admin Dashboard - Products</h1>
    
    <a href="{{ route('products.create') }}" style="display: inline-block; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; margin-bottom: 20px; border-radius: 4px;">Add New Product</a>
    
    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th style="border: 1px solid #ddd; padding: 12px; text-align: left;">ID</th>
                <th style="border: 1px solid #ddd; padding: 12px; text-align: left;">Name</th>
                <th style="border: 1px solid #ddd; padding: 12px; text-align: left;">Price</th>
                <th style="border: 1px solid #ddd; padding: 12px; text-align: left;">Stock</th>
                <th style="border: 1px solid #ddd; padding: 12px; text-align: left;">User ID</th>
                <th style="border: 1px solid #ddd; padding: 12px; text-align: left;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td style="border: 1px solid #ddd; padding: 12px;">{{ $product->id_product }}</td>
                <td style="border: 1px solid #ddd; padding: 12px;">{{ $product->nama_product }}</td>
                <td style="border: 1px solid #ddd; padding: 12px;">Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                <td style="border: 1px solid #ddd; padding: 12px;">{{ $product->stok }}</td>
                <td style="border: 1px solid #ddd; padding: 12px;">{{ $product->id_user }}</td>
                <td style="border: 1px solid #ddd; padding: 12px;">
                    <a href="{{ route('products.edit', $product->id_product) }}" style="padding: 6px 12px; background-color: #2196F3; color: white; text-decoration: none; margin-right: 5px; border-radius: 4px;">Edit</a>
                    <form action="{{ route('products.destroy', $product->id_product) }}" method="POST" style="display: inline;"> @csrf @method('DELETE') <button type="submit" style="padding: 6px 12px; background-color: #f44336; color: white; border: none; border-radius: 4px;" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button> </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    @if($products->isEmpty())
    <p style="text-align: center; margin-top: 20px; color: #666;">No products found.</p>
    @endif
</div>
@endsection


