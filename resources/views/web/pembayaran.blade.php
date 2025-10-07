@extends('web.layouts.main')
@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(assets/img/bg/bg-2.webp);">
        <div class="container position-relative">
            <h1>Society of Screams Fest 2025</h1>
            <p>Cek status pembayaran dan konfirmasi transaksi Society of Screams Fest 2025</p>
        </div>
    </div><!-- End Page Title -->

    <!-- Ticket Order Section -->
    <section id="ticket-order" class="service-details section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
                <!-- Main Content Area -->

                <!-- Sidebar Ticket Form -->
                <div class="col-lg-7">
                    <div class="service-sidebar" data-aos="fade-up" data-aos-delay="200">
                        <!-- Ticket Overview -->
                        <div class="overview-card">
                            <div class="overview-header">
                                <h4>Detail pemesanan</h4>
                            </div>
                            <div class="overview-details">
                                <div class="detail-row">
                                    <span class="detail-label">Nomor Traksaksi</span>
                                    <span class="detail-value">{{ $transaksi->kode_transaksi }}</span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label">Nama</span>
                                    <span class="detail-value">{{ $transaksi->customer->nama }}</span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label">Provinsi</span>
                                    <span class="detail-value">{{ $transaksi->customer->provinsi->nama }}</span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label">Kabupaten / Kota</span>
                                    <span class="detail-value">{{ $transaksi->customer->kota->nama }}</span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label">Kecamatan</span>
                                    <span class="detail-value">{{ $transaksi->customer->kecamatan->nama }}</span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label">Desa</span>
                                    <span class="detail-value">{{ $transaksi->customer->desa->nama }}</span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label">Jumlah Tiket</span>
                                    <span class="detail-value">{{ $transaksi->jumlah_tiket }}</span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label">Total Bayar</span>
                                    <span class="detail-value">Rp {{ number_format($transaksi->total_bayar, 0, ',', '.') }}</span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label">Status Pembayaran</span>
                                    <span class="detail-value">{{ $transaksi->status_bayar }}</span>
                                </div>
                            </div>
                        </div>


                    </div>

                </div><!-- End Sidebar -->
                <div class="col-md-5">
                    <div class="service-sidebar" data-aos="fade-up" data-aos-delay="200">

                        <div class="overview-card">
                            <div class="overview-header">
                                <h4>Rekening Pembayaran</h4>
                            </div>
                            <div class="overview-details">
                                <div class="detail-row">
                                    <span class="detail-label">Bank BNI An. Iwan Himawan</span>
                                    <span class="detail-value">1845232728</span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label">Bank BRI An. Iwan Himawan</span>
                                    <span class="detail-value">570501044890537</span>
                                </div>

                                <div class="detail-row">
                                    <img src="{{ asset('assets/qris-sdm.jpg') }}" class="w-100">

                                </div>
                                <div class="detail-row">
                                    <button onclick="konfirmasiAdmin();" class="btn btn-gradient w-100">
                                        Konfirmasi Ke Admin <i class="bi bi-arrow-right"></i>
                                    </button>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Ticket Order Section -->

@endsection
@section('scripts')
    <script>
        function konfirmasiAdmin() {
            let noAdmin = "6285126460133"; // ganti dengan nomor WA admin
            let pesan = `Halo Admin,%0ASaya telah melakukan pembayaran dengan detail:%0A%0A🔑 Kode Transaksi: {{ $transaksi->kode_transaksi }}%0A🔑 Atas Nama: {{ $transaksi->customer->nama }}%0A💰 Total Bayar: Rp {{ $transaksi->total_bayar }}%0A%0AMohon konfirmasi pesanan saya.`;
            window.open(`https://wa.me/${noAdmin}?text=${pesan}`, "_blank");
        }
    </script>
@endsection