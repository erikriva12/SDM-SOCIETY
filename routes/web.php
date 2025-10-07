<?php

use App\Http\Controllers\ExampleController;
use App\Http\Controllers\HakaksesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::withoutMiddleware(['auth'])->group(function ()
{

    Route::get('/', [WebsiteController::class, 'index']);
    Route::get('/pesan-tiket', [WebsiteController::class, 'orderTicket'])->name('orderTicket');
    // routes/web.php
    Route::get('/get-provinsi', [WebsiteController::class, 'getProvinsi'])->name('getProvinsi');
    Route::get('/get-kabupaten/{provinsi_id}', [WebsiteController::class, 'getKabupaten'])->name('getKabupaten');
    Route::get('/get-kecamatan/{kabupaten_id}', [WebsiteController::class, 'getKecamatan'])->name('getKecamatan');
    Route::get('/get-desa/{kecamatan_id}', [WebsiteController::class, 'getDesa'])->name('getDesa');

    Route::post('/store-pemesanan', [WebsiteController::class, 'storepemesanan'])->name('storepemesanan');
    Route::get('/pembayaran/{kodeTransaksi}', [WebsiteController::class, 'pembayaran'])->name('pembayaran');
    Route::get('/csrf-token', function () {
    return response()->json(['csrf_token' => csrf_token()]);
});



});

Auth::routes();

Route::middleware(['auth'])->group(function ()
{

    Route::group(['prefix' => 'admin'], function ()
    {
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::get('/update_pembayaran', [HomeController::class, 'updatePembayaran'])->name('update_pembayaran');
        Route::get('/detail_transaksi/{transaksiId}', [HomeController::class, 'detailTransaksi'])->name('detail_transaksi');
        Route::post('/update-status-bayar', [HomeController::class, 'updateStatus'])->name('update_status_bayar');



        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/profile/change-password', [ProfileController::class, 'changepassword'])->name('profile.change-password');
        Route::put('/profile/password', [ProfileController::class, 'password'])->name('profile.password');

        Route::get('/hakakses', [HakaksesController::class, 'index'])->name('hakakses.index');
        Route::get('/hakakses/edit/{id}', [HakaksesController::class, 'edit'])->name('hakakses.edit');
        Route::put('/hakakses/update/{id}', [HakaksesController::class, 'update'])->name('hakakses.update');
        Route::delete('/hakakses/delete/{id}', [HakaksesController::class, 'destroy'])->name('hakakses.delete');

        // daftar customer
        Route::group(['prefix' => 'customer'], function ()
        {
            Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
            Route::get('/get-data', [CustomerController::class, 'getData'])->name('customer.get_data');
        });
    });

    Route::get('/blank-page', [HomeController::class, 'blank'])->name('blank');

    // can be deleted

    Route::get('/table-example', [ExampleController::class, 'table'])->name('table.example');
    Route::get('/clock-example', [ExampleController::class, 'clock'])->name('clock.example');
    Route::get('/chart-example', [ExampleController::class, 'chart'])->name('chart.example');
    Route::get('/form-example', [ExampleController::class, 'form'])->name('form.example');
    Route::get('/map-example', [ExampleController::class, 'map'])->name('map.example');
    Route::get('/calendar-example', [ExampleController::class, 'calendar'])->name('calendar.example');
    Route::get('/gallery-example', [ExampleController::class, 'gallery'])->name('gallery.example');
    Route::get('/todo-example', [ExampleController::class, 'todo'])->name('todo.example');
    Route::get('/contact-example', [ExampleController::class, 'contact'])->name('contact.example');
    Route::get('/faq-example', [ExampleController::class, 'faq'])->name('faq.example');
    Route::get('/news-example', [ExampleController::class, 'news'])->name('news.example');
    Route::get('/about-example', [ExampleController::class, 'about'])->name('about.example');
    // can be deleted

});
