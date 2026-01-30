@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Your Cart</h1>

    @if(session('cart') && count(session('cart')) > 0)
        <div class="table-responsive">
            <table class="table table-dark table-striped align-middle">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach(session('cart') as $id => $details)
                        @php $total += $details['price'] * $details['quantity']; @endphp
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <img src="{{ $details['image'] ?: 'https://via.placeholder.com/50' }}" width="50" height="50"
                                        class="rounded" alt="{{ $details['name'] }}">
                                    <span>{{ $details['name'] }}</span>
                                </div>
                            </td>
                            <td>${{ $details['price'] }}</td>
                            <td>{{ $details['quantity'] }}</td>
                            <td>${{ $details['price'] * $details['quantity'] }}</td>
                            <td>
                                <a href="{{ route('cart.remove', $id) }}" class="btn btn-sm btn-outline-danger">Remove</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="text-end mt-4">
            <h3 class="mb-3">Total: <span class="text-warning">${{ $total }}</span></h3>
            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary me-2">Continue Shopping</a>
            <a href="{{ route('checkout.create') }}" class="btn btn-warning">Proceed to Checkout</a>
        </div>
    @else
        <div class="text-center py-5">
            <p class="fs-5 text-secondary mb-4">Your cart is empty.</p>
            <a href="{{ route('products.index') }}" class="btn btn-warning btn-lg">Start Shopping</a>
        </div>
    @endif
@endsection