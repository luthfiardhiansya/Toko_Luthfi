<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_revenue'   => Order::whereIn('status', ['processing', 'completed'])
                                    ->sum('total_amount'),
            'total_orders'    => Order::count(),
            'pending_orders'  => Order::where('status', 'pending')
                                    ->where('payment_status', 'paid')
                                    ->count(),
            'total_products'  => Product::count(),
            'total_customers' => User::where('role', 'customer')->count(),
            'low_stock'       => Product::where('stock', '<=', 5)->count(),
        ];

        $recentOrders = Order::with('user')
            ->latest()
            ->take(5)
            ->get();

        $topProducts = Product::withCount([
            'orderItems as sold' => function ($q) {
                $q->select(DB::raw('SUM(quantity)'))
                  ->whereHas('order', function ($query) {
                      $query->where('payment_status', 'paid');
                  });
            }
        ])
        ->having('sold', '>', 0)
        ->orderByDesc('sold')
        ->take(5)
        ->get();

        $revenueChart = collect();

        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');

            $total = Order::whereDate('created_at', $date)
                ->where('payment_status', 'paid')
                ->sum('total_amount');

            $revenueChart->push([
                'date'  => $date,
                'total' => $total
            ]);
        }

        return view('admin.dashboard', compact(
            'stats',
            'recentOrders',
            'topProducts',
            'revenueChart'
        ));
    }
}
