<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .btn { display: inline-block; padding: 10px 20px; text-decoration: none; border-radius: 5px; }
        .btn-primary { background-color: #007bff; color: white; }
        .btn-primary:hover { background-color: #0056b3; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f8f9fa; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Halo, {{ $order->user->name }}</h2>
        <p>Terima kasih! Pembayaran untuk pesanan <strong>#{{ $order->order_number }}</strong> telah kami terima. Kami sedang memproses pesanan Anda.</p>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Qty</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                <tr>
                    <td>{{ $item->product_name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="2"><strong>Total</strong></td>
                    <td><strong>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</strong></td>
                </tr>
            </tbody>
        </table>
        
        <div class="text-center mt-3">
            <a href="{{ route('orders.show', $order) }}" class="btn btn-primary">Lihat Detail Pesanan</a>
        </div>
        
        <p>Jika ada pertanyaan, silakan balas email ini.</p>
        
        <p>Salam,<br>{{ config('app.name') }}</p>
    </div>
</body>
</html>