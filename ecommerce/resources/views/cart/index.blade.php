@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Shopping Cart</h1>

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(count($cartItems) > 0)
        <div class="card mb-6">
            <table class="table">
                <thead class="table-header">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Product</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Price</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Quantity</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-body">
                    @php $total = 0; @endphp
                    @foreach($cartItems as $item)
                        @php $subtotal = $item['product']->price * $item['quantity']; $total += $subtotal; @endphp
                        <tr>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">{{ $item['product']->name }}</div>
                                        <div class="text-sm text-gray-500">{{ Str::limit($item['product']->description, 50) }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                Rp {{ number_format($item['product']->price, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4">
                                <form method="POST" action="{{ route('cart.update', $item['product']->id_product) }}" class="cart-update-form">
                                    @csrf
                                    @method('PUT')
                                    <div class="cart-quantity-controls">
                                        <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="quantity-input">
                                        <button type="submit" class="btn-primary btn-small">Update</button>
                                    </div>
                                </form>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                Rp {{ number_format($subtotal, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 text-sm font-medium">
                                <form method="POST" action="{{ route('cart.remove', $item['product']->id_product) }}" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-danger btn-small" onclick="return confirm('Remove this item from cart?')">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="cart-summary">
            <div class="cart-total">
                Total: Rp {{ number_format($total, 0, ',', '.') }}
            </div>
            <div class="cart-actions">
                <form method="POST" action="{{ route('cart.clear') }}" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-danger" onclick="return confirm('Clear entire cart?')">
                        Clear Cart
                    </button>
                </form>
                <a href="{{ route('dashboard') }}" class="btn-secondary">
                    Continue Shopping
                </a>
                <button class="btn-primary">
                    Checkout
                </button>
            </div>
        </div>
    @else
        <div class="card p-8 text-center">
            <div class="text-gray-500 text-lg mb-4">Your cart is empty</div>
            <a href="{{ route('dashboard') }}" class="btn-primary">
                Start Shopping
            </a>
        </div>
    @endif
</div>
@endsection