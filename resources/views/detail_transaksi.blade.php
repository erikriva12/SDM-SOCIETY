<div class="card mt-3">
    <div class="card-header">Detail Transaksi</div>
    <div class="card-body">
        <p><strong>Kode Transaksi:</strong> {{ $transaksi->kode_transaksi }}</p>
        <p><strong>Nama Customer:</strong> {{ $transaksi->customer->nama }}</p>
        <p><strong>Jumlah Tiket:</strong> {{ $transaksi->jumlah_tiket }}</p>
        <p><strong>Total Bayar:</strong> Rp {{ number_format($transaksi->total_bayar, 0, ',', '.') }}</p>
        <p><strong>Status:</strong> <span id="statusText">{{ $transaksi->status_bayar }}</span></p>

        <div class="form-group mt-3">
            <label for="status_bayar">Update Status</label>
            <select class="form-control" id="status_bayar">
                <option value="unpaid" {{ $transaksi->status_bayar == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                <option value="paid" {{ $transaksi->status_bayar == 'paid' ? 'selected' : '' }}>Paid</option>
                <option value="pending" {{ $transaksi->status_bayar == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="cancelled" {{ $transaksi->status_bayar == 'cancelled' ? 'selected' : '' }}>Cancelled
                </option>
            </select>
        </div>
        <button class="btn btn-success mt-2" onclick="updateStatus({{ $transaksi->transaksi_tiket_id }})">
            Update Status
        </button>
    </div>
</div>