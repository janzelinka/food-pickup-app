@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col">
                <h1 class="text-warning">Order Management</h1>
            </div>
        </div>

        <div class="card bg-dark border-secondary">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-dark table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Email</th>
                                <th>Total Price</th>
                                <th>Pickup Time</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orders as $order)
                                <tr>
                                    <td>#{{ $order->id }}</td>
                                    <td>{{ $order->customer_name }}</td>
                                    <td>{{ $order->customer_email }}</td>
                                    <td>{{ number_format($order->total_price, 2) }}€</td>
                                    <td>{{ \Carbon\Carbon::parse($order->pickup_time)->format('M d, H:i') }}</td>
                                    <td>
                                        <span
                                            class="badge @if($order->status == 'pending') bg-info @elseif($order->status == 'completed') bg-success @else bg-secondary @endif">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $order->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <a href="{{ route('admin.orders.show', $order->id) }}"
                                            class="btn btn-sm btn-warning">View</a>
                                        <a href="{{ route('admin.orders.pdf', $order->id) }}"
                                            class="btn btn-sm btn-outline-info">PDF</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4 text-secondary">No orders found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection