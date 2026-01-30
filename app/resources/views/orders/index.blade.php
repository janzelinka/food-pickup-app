@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h1 class="display-4 fw-bold text-warning mb-3">Moje Objednávky / My Orders</h1>
                <p class="lead text-secondary">Manage and track your sandwich pickups.</p>
            </div>
        </div>

        @if(session('error'))
            <div class="alert alert-danger border-0 shadow-sm mb-4">
                {{ session('error') }}
            </div>
        @endif

        <!-- Upcoming Pickups -->
        <div class="mb-5">
            <h2 class="h3 text-warning mb-4 d-flex align-items-center">
                <span class="me-2">📅</span> Budúce odbery / Upcoming Pickups
            </h2>
            <div class="row g-4">
                @forelse($upcomingOrders as $order)
                    <div class="col-md-6 col-lg-4">
                        <div class="card bg-dark border-secondary h-100 shadow-sm border-start border-warning border-4">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <span class="badge bg-warning text-dark text-uppercase">#{{ $order->id }}</span>
                                    <span class="badge bg-info">{{ ucfirst($order->status) }}</span>
                                </div>
                                <h5 class="fw-bold mb-1">{{ \Carbon\Carbon::parse($order->pickup_time)->format('H:i') }}</h5>
                                <p class="text-secondary small mb-3">
                                    {{ \Carbon\Carbon::parse($order->pickup_time)->format('d. F Y') }}</p>

                                <hr class="border-secondary opacity-25">

                                <div class="mt-3">
                                    <p class="small text-secondary mb-1">Total:</p>
                                    <p class="fs-5 fw-bold text-white mb-0">{{ number_format($order->total_price, 2) }}€</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-4 card bg-dark border-secondary">
                        <p class="text-secondary mb-0">Žiadne čakajúce objednávky. / No pending orders.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Order History -->
        <div>
            <h2 class="h3 text-warning mb-4 d-flex align-items-center">
                <span class="me-2">📜</span> História / History
            </h2>
            <div class="card bg-dark border-secondary shadow-sm overflow-hidden">
                <div class="table-responsive">
                    <table class="table table-dark table-hover mb-0 align-middle">
                        <thead class="bg-black">
                            <tr>
                                <th class="ps-4">ID</th>
                                <th>Dátum / Date</th>
                                <th>Status</th>
                                <th>Suma / Amount</th>
                                <th class="text-end pe-4">Doklady / Assets</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pastOrders as $order)
                                <tr>
                                    <td class="ps-4"><span class="text-secondary">#</span>{{ $order->id }}</td>
                                    <td>{{ \Carbon\Carbon::parse($order->pickup_time)->format('d.m.Y H:i') }}</td>
                                    <td>
                                        <span
                                            class="badge @if($order->status == 'completed') bg-success @else bg-secondary @endif">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td class="fw-bold">{{ number_format($order->total_price, 2) }}€</td>
                                    <td class="text-end pe-4">
                                        @if($order->status == 'completed')
                                            <a href="{{ route('orders.user_pdf', $order->id) }}"
                                                class="btn btn-sm btn-outline-warning">
                                                📄 Stiahnuť PDF / Download PDF
                                            </a>
                                        @else
                                            <span class="text-secondary small">PDF limited to completed orders</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5 text-secondary">
                                        Ešte nemáte žiadnu históriu. / No order history yet.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($pastOrders->hasPages())
                    <div class="card-footer bg-dark border-0 p-3">
                        {{ $pastOrders->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection