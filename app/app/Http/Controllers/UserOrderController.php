<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class UserOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();

        $upcomingOrders = $user->orders()
            ->where('pickup_time', '>=', now())
            ->where('status', '!=', 'completed')
            ->orderBy('pickup_time', 'asc')
            ->get();

        $pastOrders = $user->orders()
            ->where(function ($query) {
                $query->where('pickup_time', '<', now())
                    ->orWhere('status', 'completed');
            })
            ->orderBy('pickup_time', 'desc')
            ->paginate(10);

        return view('orders.index', compact('upcomingOrders', 'pastOrders'));
    }

    public function downloadPdf($id)
    {
        $order = Order::with(['user', 'items.product'])->findOrFail($id);

        // Security check: Only allow the owner to download
        if ((int)$order->user_id !== auth()->id()) {
            abort(403);
        }

        // Restriction: Only allow download if completed (picked up)
        if ($order->status !== 'completed') {
            return redirect()->back()->with('error', 'PDF is available only after pickup (Completed status).');
        }

        $pdf = Pdf::loadView('admin.orders.pdf', compact('order'));
        return $pdf->download('order-' . $order->id . '.pdf');
    }
}
