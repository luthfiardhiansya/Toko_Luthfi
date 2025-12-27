<?php
namespace App\Http\Controllers;

use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Menampilkan daftar pesanan milik user yang sedang login.
     */
    public function index()
    {
        $orders = auth()->user()->orders()
            ->with(['items.product'])
            ->latest()                
            ->paginate(10);

        return view('orders.index', compact('orders'));
    }

    /**
     * Menampilkan detail satu pesanan.
     */
    public function show(Order $order)
    {
        if ($order->user_id !== auth()->id()) {
            abort(403, 'Anda tidak memiliki akses ke pesanan ini.');
        }

        $order->load(['items.product', 'items.product.primaryImage']);

        return view('orders.show', compact('order'));
    }

    /**
     * Menampilkan halaman status pembayaran sukses.
     */
    public function success(Order $order)
    {
        if ($order->user_id !== auth()->id()) {
            abort(403, 'Anda tidak memiliki akses ke pesanan ini.');
        }
        return view('orders.success', compact('order'));
    }

    /**
     * Menampilkan halaman status pembayaran pending.
     */
    public function pending(Order $order)
    {
        if ($order->user_id !== auth()->id()) {
            abort(403, 'Anda tidak memiliki akses ke pesanan ini.');
        }
        return view('orders.pending', compact('order'));
    }
}
