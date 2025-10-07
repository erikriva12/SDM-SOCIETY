<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<!-- ndek iki dii -->
<style>
    
</style>

<table border="0">
    <tbody>
        <tr>
            <td class="detail-label">Nomor Transaksi</td>
            <td class="detail-value">{{ $transaksi->kode_transaksi }}</td>
        </tr>
        <tr>
            <td class="detail-label">Nama</td>
            <td class="detail-value">{{ $transaksi->customer->nama }}</td>
        </tr>
        <tr>
            <td class="detail-label">Provinsi</td>
            <td class="detail-value">{{ $transaksi->customer->provinsi->nama }}</td>
        </tr>
        <tr>
            <td class="detail-label">Kabupaten / Kota</td>
            <td class="detail-value">{{ $transaksi->customer->kota->nama }}</td>
        </tr>
        <tr>
            <td class="detail-label">Kecamatan</td>
            <td class="detail-value">{{ $transaksi->customer->kecamatan->nama }}</td>
        </tr>
        <tr>
            <td class="detail-label">Desa</td>
            <td class="detail-value">{{ $transaksi->customer->desa->nama }}</td>
        </tr>
        <tr>
            <td class="detail-label">Jumlah Tiket</td>
            <td class="detail-value">{{ $transaksi->jumlah_tiket }}</td>
        </tr>
        <tr>
            <td class="detail-label">Total Bayar</td>
            <td class="detail-value">Rp {{ number_format($transaksi->total_bayar, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td class="detail-label">Status Pembayaran </td>
            <td class="detail-value">
        @if($transaksi->status_bayar == 'paid')
        <div class="badge text-bg-success">
            
        <i class="bi bi-check"></i> Pembayaran Berhasil
        </div>
        @else
        <div class="badge text-bg-danger">
            
        <i class="bi bi-x"></i>  Belum Dibayar / Menunggu Konfirmasi
        </div>
        @endif
                
                
                </td>
        </tr>
    </tbody>
</table>
<div class="row">
    <div class="col-md-12 text-center">
        
    
                                    <button onclick="konfirmasiAdmin();" class="btn btn-outline-danger">
                                        Konfirmasi Ke Admin <i class="bi bi-arrow-right"></i>
                                    </button>

                                </div>
</div>

<script>
        function konfirmasiAdmin() {
            let noAdmin = "6285126460133"; // ganti dengan nomor WA admin
            let pesan = `Halo Admin,%0ASaya telah melakukan pembayaran dengan detail:%0A Kode Transaksi: {{ $transaksi->kode_transaksi }}%0A° Atas Nama: {{ $transaksi->customer->nama }}%0A° Total Bayar: Rp {{ $transaksi->total_bayar }}%0A Mohon konfirmasi pesanan saya.%0A
https://sdmsociety.com/halaman-pembayaran/?kode={{$transaksi->kode_transaksi}}
            `;
            window.open(`https://wa.me/${noAdmin}?text=${pesan}`, "_blank");
        }
    </script>