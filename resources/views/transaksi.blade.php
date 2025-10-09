@extends('layouts.app')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Daftar Transaksi</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nomor Transaksi</th>
                                    <th>Nama Customer</th>
                                    <th>Jumlah Tiket</th>
                                    <th>Jumlah Bayar</th>
                                    <th>Status Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksi as $key => $val)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $val->kode_transaksi }}</td>
                                        <td>{{ $val->customer->nama }}</td>
                                        <td>{{ $val->jumlah_tiket }}</td>
                                        <td>{{ $val->total_bayar }}</td>
                                        <td>{{ $val->status_bayar }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('scripts')
    <script>

    </script>
@endsection