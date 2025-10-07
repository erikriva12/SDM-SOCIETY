
jQuery(document).ready(function($) {
    var csrf = null;

function getCsrf() {
    $.ajax({
        url: "https://laravel.sdmsociety.com/csrf-token",
        type: "GET",
        dataType: "json",
        success: function (data) {
            console.log("Token CSRF:", data);
            csrf = data.csrf_token;
        },
        error: function (xhr, status, error) {
            console.error("Gagal ambil CSRF:", error);
        }
    });
}

getCsrf();

        // Load Provinsi
        $.ajax({
            url: 'https://laravel.sdmsociety.com/get-provinsi',
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
                    url: 'https://laravel.sdmsociety.com/get-kabupaten/' + provinsiId,
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
                    url: 'https://laravel.sdmsociety.com/get-kecamatan/' + kabupatenId,
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
                    url: 'https://laravel.sdmsociety.com/get-desa/' + kabupatenId,
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
                        let noAdmin = "6282182842862"; // ganti dengan nomor WA admin
                        let pesan = `Halo Admin,%0ASaya telah memesan tiket dengan detail:%0A%0A🔑 Kode Transaksi: ${kodeTransaksi}%0A💰 Total Bayar: Rp ${totalBayar}%0A%0AMohon konfirmasi pesanan saya.`;

                        Swal.fire({
                            title: "Berhasil",
                            html: `<p>Pemesanan Berhasil Dibuat.</p><p><b>Kode Transaksi:</b> ${kodeTransaksi}</p><p><b>Total Bayar:</b> Rp ${totalBayar}</p><p>Silahkan melakukan proses pembayaran</p>`,
                            icon: "success",
                            confirmButtonText: "Lanjut Proses Pembayaran"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // window.open(`https://wa.me/${noAdmin}?text=${pesan}`, "_blank");
                                var renderUrl = "https://sdmsociety.com/halaman-pembayaran?kode="+kodeTransaksi;
                                
                                window.open(renderUrl, "_blank");
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
        function getDetail(){
            // dari URL halaman sekarang
const kode = new URL(window.location.href).searchParams.get('kode');

        $('#detail-pemesanan').load("https://laravel.sdmsociety.com/api/detail-pesanan/"+kode)
    }
    getDetail();
    });
    
    