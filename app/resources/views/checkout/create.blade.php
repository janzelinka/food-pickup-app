@extends('layouts.app')

@section('content')
    <h1 class="text-center mb-4">Checkout</h1>

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card bg-dark border-secondary">
                <div class="card-body p-4">
                    <form action="{{ route('order.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="customer_name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="customer_name" id="customer_name" required>
                        </div>

                        <div class="mb-3">
                            <label for="customer_email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" name="customer_email" id="customer_email" required>
                        </div>

                        <div class="mb-4">
                            <label for="pickup_time" class="form-label">Pickup Time</label>
                            <input type="datetime-local" class="form-control" name="pickup_time" id="pickup_time" required>
                            <div class="form-text">Please schedule at least 1 hour in advance.</div>
                        </div>

                        <hr class="my-4">

                        <h5 class="mb-3">Order Summary</h5>
                        @php $total = 0; @endphp
                        @if(session('cart'))
                            <ul class="list-group list-group-flush bg-transparent mb-3">
                                @foreach(session('cart') as $id => $details)
                                    @php $total += $details['price'] * $details['quantity']; @endphp
                                    <li
                                        class="list-group-item bg-transparent text-white d-flex justify-content-between border-secondary">
                                        <span>{{ $details['name'] }} (x{{ $details['quantity'] }})</span>
                                        <span>${{ $details['price'] * $details['quantity'] }}</span>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="d-flex justify-content-between fs-5 fw-bold mb-4">
                                <span>Total</span>
                                <span class="text-warning">${{ $total }}</span>
                            </div>
                        @endif

                        <button type="submit" class="btn btn-warning w-100 btn-lg">Place Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection