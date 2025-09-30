@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Update Pembayaran</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">Nomor Transaksi</div>
                            <div class="col-md-10">
                                <select class="form-control select2" id="idTransaksi" onchange="getTransaksi()">
                                    <option value="">Pilih</option>
                                    @foreach ($unpaid as $val)
                                        <option value="{{ $val->transaksi_tiket_id }}">
                                            {{ $val->kode_transaksi }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3" id="detailTransaksi">
                            <!-- detail transaksi akan dimuat di sini -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('.select2').select2();
        function getTransaksi() {
            var transaksiId = $('#idTransaksi').val();

            if (transaksiId) {
                var renderUrl = "{{ route('detail_transaksi', ':transaksiId') }}";
                renderUrl = renderUrl.replace(':transaksiId', transaksiId);
                $.ajax({
                    url: renderUrl,
                    type: "GET",
                    beforeSend: function () {
                        $('#detailTransaksi').html('<div class="text-center p-3">Loading...</div>');
                    },
                    success: function (response) {
                        $('#detailTransaksi').html(response);
                    },
                    error: function (xhr) {
                        $('#detailTransaksi').html('<div class="alert alert-danger">Gagal mengambil data.</div>');
                    }
                });
            } else {
                $('#detailTransaksi').html('');
            }
        }
        function updateStatus(transaksiId) {
            let status = $('#status_bayar').val();

            $.ajax({
                url: "{{ route('update_status_bayar') }}",
                type: "POST",
                data: {
                    id: transaksiId,
                    status_bayar: status,
                    _token: "{{ csrf_token() }}"
                },
                success: function (response) {
                    if (response.success) {
                        $('#statusText').text(response.data.status_bayar);
                        alert(response.message);
                        getTransaksi();
                    } else {
                        alert("Gagal update status.");
                    }
                },
                error: function (xhr) {
                    alert("Terjadi kesalahan saat update status.");
                }
            });
        }
    </script>
@endsection