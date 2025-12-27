<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Menampilkan daftar semua pesanan untuk admin.
     * Dilengkapi filter by status.
     */
    public function index(Request $request)
    {
        $orders = Order::query()
            ->with('user')
            ->when($request->status, function ($q, $status) {
                $q->where('status', $status);
            })
            ->latest() 
            ->paginate(20);

        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load(['items.product', 'user']);
        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:processing,shipped,delivered,cancelled',
        ]);

        $oldStatus = $order->status;
        $newStatus = $request->status === 'completed' ? 'delivered' : $request->status;

        if ($newStatus === 'cancelled' && $oldStatus !== 'cancelled') {
            foreach ($order->items as $item) {
                $item->product->increment('stock', $item->quantity);
            }
        }

        $order->update(['status' => $newStatus]);

        return back()->with('success', "Status pesanan diperbarui menjadi $newStatus");
    }
}
