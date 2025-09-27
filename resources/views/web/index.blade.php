@extends('web.layouts.main')
@section('content')
  <!-- Hero Section -->
  <section id="hero" class="hero section dark-background" data-aos="fade"
    style="background-image: url({{asset('assets/img/main-banner.png')}}); backgound-position: center;">

    <div class="hero-content">
      <img src="{{asset('assets/img/main-banner.png')}}" alt="Business Process Optimization" class="img-fluid"
        style="height: unset !important;">
    </div>

  </section><!-- /Hero Section -->

  <section id="countdown" class="countdown section dark-background">

    <div class="container" data-aos="fade-down" data-aos-delay="100">
      <div class="row">
        <div class="col-12">
          <div id="countdowns" class="countdown"></div>
        </div>
        <div class="col-12 mt-3">
          <h1 class="text-center">Let's start the game!</h1>
          <p class="text-center fst-italic text-muted" style="color: #fa923d !important;">
            "Siapakah Pelakunya?."
          </p>
        </div>
      </div>
    </div>

  </section><!-- /Hero Section -->

  <!-- About Section -->
  <section id="ticket" class="service-details section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row">
        <!-- Main Content Area -->
        <div class="col-lg-7">
          <!-- Hero Ticket Introduction -->
          <div class="service-hero" data-aos="fade-up" data-aos-delay="100">
            <h1>Pemesanan Tiket Presale</h1>
            <p class="service-description">
              Hanya tersedia 50 tiket dengan harga spesial presale! Siapa cepat dia dapat, jangan sampai kehabisan! 🚀

              👉 Segera amankan tiketmu sekarang sebelum SOLD OUT!<br>

              Nikmati pengalaman seru
              di <strong>Society of Screams Fest 2025</strong>.</p>
          </div>
          <!-- Event Visual -->
          <div class="service-visual" data-aos="zoom-in" data-aos-delay="200">
            <img src="{{asset('assets/img/main-poster.png')}}" alt="Business Process Optimization" class="img-fluid"
              style="height: unset !important;">
          </div>

        </div><!-- End Main Content -->

        <!-- Sidebar Ticket Form -->
        <div class="col-lg-5">
          <div class="service-sidebar" data-aos="fade-up" data-aos-delay="200">
            <!-- Purchase Steps -->
            <div class="timeline-section" data-aos="fade-up" data-aos-delay="500">
              <h3>Cara Pemesanan</h3>
              <div class="timeline">
                <div class="timeline-item">
                  <div class="timeline-marker"><span>1</span></div>
                  <div class="timeline-content">
                    <h4>Isi Data</h4>
                    <p>Lengkapi nama, no whatsapp, dan alamat dengan benar.</p>
                  </div>
                </div>
                <div class="timeline-item">
                  <div class="timeline-marker"><span>2</span></div>
                  <div class="timeline-content">
                    <h4>Pembayaran</h4>
                    <p>Konfirmasi transaksi anda dengan whatsapp kami.</p>
                  </div>
                </div>
                <div class="timeline-item">
                  <div class="timeline-marker"><span>3</span></div>
                  <div class="timeline-content">
                    <h4>Dapatkan Ticket</h4>
                    <p>Tiket akan dikirimkan ke alamat kamu.</p>
                  </div>
                </div>
              </div>
            </div>
            <!-- Ticket Overview -->
            <div class="overview-card">
              <div class="overview-header">
                <h4>Detail Event</h4>
              </div>
              <div class="overview-details">
                <div class="detail-row">
                  <span class="detail-label">Tanggal</span>
                  <span class="detail-value">25 Oktober 2025</span>
                </div>
                <div class="detail-row">
                  <span class="detail-label">Lokasi</span>
                  <span class="detail-value">BRUNO AGUSTO <br>HEADQUARTER</span>
                </div>
                <div class="detail-row">
                  <span class="detail-label">Kategori Tiket</span>
                  <span class="detail-value">Presale</span>
                </div>
              </div>
            </div>

            <!-- Ticket Order Form -->
            <div class="consultation-form">
              <div class="form-header">
                <h4>Pesan Tiket Sekarang</h4>
                <p>Isi formulir di bawah untuk melakukan pemesanan tiket.</p>
              </div>
              <form action="{{ route('storepemesanan') }}" method="post" class="php-email-form" id="form-pesan">
                @csrf
                <div class="form-group mb-3">
                  <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
                </div>
                <div class="form-group mb-3">
                  <input type="tel" name="no_wa" class="form-control" placeholder="No. Whatsapp" required>
                </div>
                <div class="row mb-3">
                  <div class="col-md-3">
                    <select id="provinsi" class="form-select" name="provinsi_id" required>
                      <option value="">Pilih Provinsi</option>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <select id="kabupaten" class="form-select" name="kota_id" required>
                      <option value="">Pilih Kabupaten/Kota</option>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <select id="kecamatan" class="form-select" name="kecamatan_id" required>
                      <option value="">Pilih Kecamatan</option>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <select id="desa" class="form-select" name="desa_id" required>
                      <option value="">Pilih Desa</option>
                    </select>
                  </div>
                </div>
                <div class="form-group mb-3">
                  <textarea class="form-control" name="alamat" placeholder="Alamat Lengkap"></textarea>
                  <small class="form-text text-warning">
                    ⚠️ Pastikan alamat diisi dengan benar dan lengkap karena tiket akan dikirim ke alamat ini.
                  </small>
                </div>

                <div class="form-group mb-3">
                  <input type="number" name="quantity" class="form-control" placeholder="Jumlah Tiket" min="1" required>
                </div>
                <button type="submit" class="btn btn-gradient w-100">
                  Pesan Sekarang <i class="bi bi-arrow-right"></i>
                </button>
              </form>
            </div>
          </div>
        </div><!-- End Sidebar -->
      </div>
    </div>
  </section><!-- /Ticket Order Section -->
  <!-- /About Section -->


@endsection
@section('scripts')
  <script>
    $(function () {
      var targetDate = new Date("Oct 25, 2025 15:00:00 GMT+0700").getTime();

      setInterval(function () {
        var now = new Date().getTime();
        var distance = targetDate - now;

        if (distance < 0) {
          $("#countdowns").html("<div>Acara sudah dimulai!</div>");
          return;
        }

        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        $("#countdowns").html(
          '<div class="time-box">' + days + '<span>Hari</span></div>' +
          '<div class="time-box">' + hours + '<span>Jam</span></div>' +
          '<div class="time-box">' + minutes + '<span>Menit</span></div>' +
          '<div class="time-box">' + seconds + '<span>Detik</span></div>'
        );
      }, 1000);
    });
    $(document).ready(function () {

      // Load Provinsi
      $.ajax({
        url: '{{ route("getProvinsi") }}',
        dataType: 'json',
        success: function (data) {
          let provinsi = $('#provinsi');
          provinsi.empty().append('<option value="">Pilih Provinsi</option>');
          $.each(data, function (i, item) {
            provinsi.append('<option value="' + item.id + '">' + item.text + '</option>');
          });
        }
      });

      // Load Kabupaten berdasarkan Provinsi
      $('#provinsi').on('change', function () {
        let provinsiId = $(this).val();
        $('#kabupaten').empty().append('<option value="">Pilih Kabupaten/Kota</option>');
        $('#kecamatan').empty().append('<option value="">Pilih Kecamatan</option>');
        $('#desa').empty().append('<option value="">Pilih Desa</option>');

        if (provinsiId) {
          $.ajax({
            url: '/get-kabupaten/' + provinsiId,
            dataType: 'json',
            success: function (data) {
              let kabupaten = $('#kabupaten');
              $.each(data, function (i, item) {
                kabupaten.append('<option value="' + item.id + '">' + item.text + '</option>');
              });
            }
          });
        }
      });

      // Load Kecamatan berdasarkan Kabupaten
      $('#kabupaten').on('change', function () {
        let kabupatenId = $(this).val();
        $('#kecamatan').empty().append('<option value="">Pilih Kecamatan</option>');
        $('#desa').empty().append('<option value="">Pilih Desa</option>');

        if (kabupatenId) {
          $.ajax({
            url: '/get-kecamatan/' + kabupatenId,
            dataType: 'json',
            success: function (data) {
              let kecamatan = $('#kecamatan');
              $.each(data, function (i, item) {
                kecamatan.append('<option value="' + item.id + '">' + item.text + '</option>');
              });
            }
          });
        }
      });
      $('#kecamatan').on('change', function () {
        let kabupatenId = $(this).val();
        $('#desa').empty().append('<option value="">Pilih Desa</option>');

        if (kabupatenId) {
          $.ajax({
            url: '/get-desa/' + kabupatenId,
            dataType: 'json',
            success: function (data) {
              let desa = $('#desa');
              $.each(data, function (i, item) {
                desa.append('<option value="' + item.id + '">' + item.text + '</option>');
              });
            }
          });
        }
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
              let kodeTransaksi = response.data.transaksi.kode_transaksi;
              let totalBayar = response.data.transaksi.total_bayar.toLocaleString();
              let noAdmin = "6282194641033"; // ganti dengan nomor WA admin
              let pesan = `Halo Admin,%0ASaya telah memesan tiket dengan detail:%0A%0A🔑 Kode Transaksi: ${kodeTransaksi}%0A💰 Total Bayar: Rp ${totalBayar}%0A%0AMohon konfirmasi pesanan saya.`;

              Swal.fire({
                title: "Berhasil",
                html: `<p>Pemesanan Berhasil Dibuat.</p>
                               <p><b>Kode Transaksi:</b> ${kodeTransaksi}</p>
                               <p><b>Total Bayar:</b> Rp ${totalBayar}</p>
                               <p>Silahkan melakukan proses pembayaran ke Admin</p>`,
                icon: "success",
                confirmButtonText: "Konfirmasi Ke Admin"
              }).then((result) => {
                if (result.isConfirmed) {
                  window.open(`https://wa.me/${noAdmin}?text=${pesan}`, "_blank");
                }
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