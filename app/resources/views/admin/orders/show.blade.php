@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="text-warning">Order #{{ $order->id }}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.orders.index') }}"
                                    class="text-warning">Orders</a></li>
                            <li class="breadcrumb-item active text-secondary" aria-current="page">Details</li>
                        </ol>
                    </nav>
                </div>
                <a href="{{ route('admin.orders.pdf', $order->id) }}" class="btn btn-info">
                    Download PDF
                </a>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card bg-dark border-secondary mb-4">
                    <div class="card-header border-secondary bg-dark">
                        <h5 class="mb-0 text-white">Order Items</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-dark mb-0">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th class="text-end">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->items as $item)
                                        <tr>
                                            <td>{{ $item->product ? $item->product->name : 'Deleted Product' }}</td>
                                            <td>{{ number_format($item->price, 2) }}€</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td class="text-end">{{ number_format($item->price * $item->quantity, 2) }}€</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="border-top border-secondary">
                                        <th colspan="3" class="text-end">Final Total:</th>
                                        <th class="text-end text-warning fs-5">{{ number_format($order->total_price, 2) }}€
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card bg-dark border-secondary mb-4">
                    <div class="card-header border-secondary bg-dark">
                        <h5 class="mb-0 text-white">Customer Details</h5>
                    </div>
                    <div class="card-body">
                        <p class="mb-1 text-secondary">Name:</p>
                        <p class="fw-bold">{{ $order->customer_name }}</p>

                        <p class="mb-1 text-secondary">Email:</p>
                        <p class="fw-bold">{{ $order->customer_email }}</p>

                        <p class="mb-1 text-secondary">Pickup Time:</p>
                        <p class="fw-bold text-info">
                            {{ \Carbon\Carbon::parse($order->pickup_time)->format('M d, Y - H:i') }}
                        </p>

                        <hr class="border-secondary">

                        <p class="mb-1 text-secondary">Status:</p>
                        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="d-flex gap-2">
                                <select name="status" class="form-select bg-dark text-white border-secondary">
                                    <option value="new" @if($order->status == 'new') selected @endif>New</option>
                                    <option value="pending" @if($order->status == 'pending') selected @endif>Pending</option>
                                    <option value="completed" @if($order->status == 'completed') selected @endif>Completed
                                    </option>
                                </select>
                                <button type="submit" class="btn btn-warning">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection