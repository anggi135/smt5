@extends('layouts.user.app')

@section('title', 'Keranjang Pesanan')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4">Keranjang Pesanan</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($cart && count($cart) > 0)
        @php
            $grandTotal = 0;
        @endphp

        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($cart as $productId => $item)
                    @php
                        $subtotal = $item['harga'] * $item['quantity'];
                        $grandTotal += $subtotal;
                    @endphp
                    <tr>
                        <td>{{ $item['nama'] }}</td>
                        <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('cart.update', $productId) }}" method="POST" class="d-flex gap-2">
                                @csrf
                                <input
                                    type="number"
                                    name="quantity"
                                    value="{{ $item['quantity'] }}"
                                    min="1"
                                    class="form-control form-control-sm"
                                    style="width: 80px;"
                                >
                                <button class="btn btn-sm btn-warning">Update</button>
                            </form>
                        </td>
                        <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $productId) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr>
                    <th colspan="3" class="text-end">Total</th>
                    <th colspan="2">
                        Rp {{ number_format($grandTotal, 0, ',', '.') }}
                    </th>
                </tr>
            </tfoot>
        </table>

        <!-- Total + Checkout -->
        <div class="d-flex justify-content-between align-items-center mt-4">
            <h4 class="fw-bold">
                Total: Rp {{ number_format($grandTotal, 0, ',', '.') }}
            </h4>
            <a href="{{ route('checkout.index') }}" class="btn btn-primary btn-lg">
                Lanjut ke Pembayaran
            </a>
        </div>
    @else
        <div class="alert alert-warning">
            Keranjang masih kosong.
        </div>
    @endif

    <a href="{{ route('home') }}" class="btn btn-secondary mt-3">
        Lanjut Belanja
    </a>
</div>
@endsection
