@extends('web.layouts.main')
@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(assets/img/bg/bg-2.webp);">
        <div class="container position-relative">
            <h1>Society of Screams Fest 2025</h1>
            <p>Beli tiket resmi untuk Halloween EDM Festival terbesar tahun ini!</p>
        </div>
    </div><!-- End Page Title -->

    <!-- Ticket Order Section -->
    <section id="ticket-order" class="service-details section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
                <!-- Main Content Area -->
                <div class="col-lg-7">
                    <!-- Hero Ticket Introduction -->
                    <div class="service-hero" data-aos="fade-up" data-aos-delay="100">
                        <h1>Pemesanan Tiket</h1>
                        <p class="service-description">Dapatkan tiketmu sekarang sebelum kehabisan! Nikmati pengalaman seru
                            di <strong>Society of Screams Fest 2025</strong>.</p>
                    </div>
                    <!-- Event Visual -->
                    <div class="service-visual" data-aos="zoom-in" data-aos-delay="200">
                        <img src="assets/img/services/services-7.webp" alt="Business Process Optimization"
                            class="img-fluid">
                    </div>
                    <!-- Ticket Benefits -->
                    <div class="service-narrative" data-aos="fade-up" data-aos-delay="300">
                        <h3>Pilihan Tiket</h3>
                        <p>Pilih kategori tiket sesuai kebutuhanmu, mulai dari Regular hingga VVIP dengan benefit spesial.
                        </p>
                        <!-- Key Benefits Grid -->
                        <div class="benefits-grid" data-aos="fade-up" data-aos-delay="400">
                            <div class="benefit-card">
                                <div class="benefit-icon"><i class="bi bi-ticket-perforated"></i></div>
                                <h4>Regular</h4>
                                <p>Akses masuk umum, nikmati semua stage & pertunjukan utama.</p>
                            </div>
                            <div class="benefit-card">
                                <div class="benefit-icon"><i class="bi bi-star"></i></div>
                                <h4>VIP</h4>
                                <p>Akses khusus VIP area, antre lebih cepat, dan free soft drink.</p>
                            </div>
                            <div class="benefit-card">
                                <div class="benefit-icon"><i class="bi bi-gem"></i></div>
                                <h4>VVIP</h4>
                                <p>Benefit VIP + Meet & Greet DJ, free merchandise eksklusif.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Purchase Steps -->
                    <div class="timeline-section" data-aos="fade-up" data-aos-delay="500">
                        <h3>Cara Pemesanan</h3>
                        <div class="timeline">
                            <div class="timeline-item">
                                <div class="timeline-marker"><span>1</span></div>
                                <div class="timeline-content">
                                    <h4>Pilih Tiket</h4>
                                    <p>Tentukan kategori dan jumlah tiket yang kamu inginkan.</p>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div class="timeline-marker"><span>2</span></div>
                                <div class="timeline-content">
                                    <h4>Isi Data</h4>
                                    <p>Lengkapi nama, no whatsapp, dan alamat dengan benar.</p>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div class="timeline-marker"><span>3</span></div>
                                <div class="timeline-content">
                                    <h4>Pembayaran</h4>
                                    <p>Lakukan pembayaran sesuai metode yang tersedia.</p>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div class="timeline-marker"><span>4</span></div>
                                <div class="timeline-content">
                                    <h4>Dapatkan Ticket</h4>
                                    <p>Tiket akan dikirimkan ke alamat kamu.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Main Content -->

                <!-- Sidebar Ticket Form -->
                <div class="col-lg-5">
                    <div class="service-sidebar" data-aos="fade-up" data-aos-delay="200">
                        <!-- Ticket Overview -->
                        <div class="overview-card">
                            <div class="overview-header">
                                <h4>Detail Event</h4>
                            </div>
                            <div class="overview-details">
                                <div class="detail-row">
                                    <span class="detail-label">Tanggal</span>
                                    <span class="detail-value">31 Oktober 2025</span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label">Lokasi</span>
                                    <span class="detail-value">Jakarta Convention Center</span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label">Kategori Tiket</span>
                                    <span class="detail-value">Regular, VIP, VVIP</span>
                                </div>
                            </div>
                        </div>

                        <!-- Ticket Order Form -->
                        <div class="consultation-form">
                            <div class="form-header">
                                <h4>Pesan Tiket Sekarang</h4>
                                <p>Isi formulir di bawah untuk melakukan pemesanan tiket.</p>
                            </div>
                            <form action="{{ route('storepemesanan') }}" method="post" class="php-email-form"
                                id="form-pesan">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="tel" name="no_wa" class="form-control" placeholder="No. Whatsapp" required>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <select id="provinsi" class="form-select select2" name="provinsi_id" required>
                                            <option value="">Pilih Provinsi</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select id="kabupaten" class="form-select select2" name="kabupaten_id" required>
                                            <option value="">Pilih Kabupaten/Kota</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select id="kecamatan" class="form-select select2" name="kecamatan_id" required>
                                            <option value="">Pilih Kecamatan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <textarea class="form-control" name="alamat" placeholder="Alamat Lengkap"></textarea>
                                </div>

                                <div class="form-group mb-3">
                                    <input type="number" name="quantity" class="form-control" placeholder="Jumlah Tiket"
                                        min="1" required>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">
                                    Pesan Sekarang <i class="bi bi-arrow-right"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div><!-- End Sidebar -->
            </div>
        </div>
    </section><!-- /Ticket Order Section -->

@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            // Init select2
            $('.select2').select2({ width: '100%' });

            // Load Provinsi
            $('#provinsi').select2({
                width: '100%',
                placeholder: 'Pilih Provinsi',
                ajax: {
                    url: '{{ route("getProvinsi") }}',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            term: params.term // kirim keyword ke controller
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data
                        };
                    }
                }
            });

            // Load Kabupaten berdasarkan Provinsi
            $('#provinsi').on('change', function () {
                let provinsiId = $(this).val();
                $('#kabupaten').empty().trigger('change');
                $('#kecamatan').empty().trigger('change');

                $('#kabupaten').select2({
                    ajax: {
                        url: '/get-kabupaten/' + provinsiId,
                        dataType: 'json',
                        processResults: function (data) {
                            return { results: data };
                        }
                    }
                });
            });

            // Load Kecamatan berdasarkan Kabupaten
            $('#kabupaten').on('change', function () {
                let kabupatenId = $(this).val();
                $('#kecamatan').empty().trigger('change');

                $('#kecamatan').select2({
                    ajax: {
                        url: '/get-kecamatan/' + kabupatenId,
                        dataType: 'json',
                        processResults: function (data) {
                            return { results: data };
                        }
                    }
                });
            });

            $("#form-pesan").submit(function () {
                var form = $(this);
                var mydata = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: form.attr("action"),
                    data: mydata,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        Swal.fire({
                            html: `<div style="text-align:center"><p style="margin-top:10px;">Sedang memproses...</p></div>`,
                            showConfirmButton: false,
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });
                    },
                    success: function (response) {
                        Swal.close();

                        if (response.status === true) {
                            Swal.fire({
                                title: "Berhasil",
                                html: `<p>Data berhasil disimpan.</p><p><b>Kode Transaksi:</b> ${response.data.transaksi.kode_transaksi}</p><p><b>Total Bayar:</b> Rp ${response.data.transaksi.total_bayar.toLocaleString()}</p>`,
                                icon: "success",
                                confirmButtonText: "OK"
                            }).then(() => {
                                window.location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: "Gagal",
                                text: response.message || "Data gagal disimpan.",
                                icon: "error"
                            });
                        }
                    },

                    error: function (xhr) {
                        Swal.close(); // tutup swal loading
                        var htmls = "";

                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            htmls += "<ul style='text-align:left;'>";
                            $("input, select, textarea").removeClass("is-invalid"); // clear dulu

                            $.each(errors, function (key, messages) {
                                // buat list di swal
                                $.each(messages, function (index, message) {
                                    htmls += "<li>" + message + "</li>";
                                });
                            });
                            htmls += "</ul>";
                        }

                        Swal.fire({
                            title: "Error",
                            icon: "error",
                            html: htmls || (xhr.responseJSON?.message || xhr.statusText || "Terjadi kesalahan pada server."),
                        });
                    }

                });
                return false;
            });
        });
    </script>

@endsection