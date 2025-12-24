@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4 py-5">
        <h1 class="h3 mb-4 text-gray-800">Checkout</h1>

        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf

            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Informasi Pengiriman</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Nama Penerima</label>
                                    <input type="text" name="name" value="{{ auth()->user()->name }}"
                                           class="form-control" required>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Nomor Telepon</label>
                                    <input type="text" name="phone"
                                           class="form-control" required>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Alamat Lengkap</label>
                                    <textarea name="address" rows="4" class="form-control" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card shadow" style="position: sticky; top: 20px;">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Ringkasan Pesanan</h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-4" style="max-height: 300px; overflow-y: auto;">
                                @foreach($cart->items as $item)
                                    <div class="d-flex justify-content-between mb-2 small">
                                        <span>{{ $item->product->name }} × {{ $item->quantity }}</span>
                                        <span class="fw-medium">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</span>
                                    </div>
                                @endforeach
                            </div>

                            <hr>

                            <div class="d-flex justify-content-between mb-4">
                                <span class="h5 mb-0">Total</span>
                                <span class="h5 mb-0 text-primary">
                                    Rp {{ number_format($cart->items->sum('subtotal'), 0, ',', '.') }}
                                </span>
                            </div>

                            <button type="submit"
                                    class="btn btn-primary btn-lg w-100">
                                Buat Pesanan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection