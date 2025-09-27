<?php

use App\Http\Controllers\CustomerController;
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
    Route::get('/migrasi', [WebsiteController::class, 'migrasi']);
    Route::post('/store-pemesanan', [WebsiteController::class, 'storepemesanan'])->name('storepemesanan');


});

Auth::routes();

Route::middleware(['auth'])->group(function ()
{

    Route::group(['prefix' => 'admin'], function ()
    {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/profile/change-password', [ProfileController::class, 'changepassword'])->name('profile.change-password');
        Route::put('/profile/password', [ProfileController::class, 'password'])->name('profile.password');

        Route::get('/hakakses', [App\Http\Controllers\HakaksesController::class, 'index'])->name('hakakses.index');
        Route::get('/hakakses/edit/{id}', [App\Http\Controllers\HakaksesController::class, 'edit'])->name('hakakses.edit');
        Route::put('/hakakses/update/{id}', [App\Http\Controllers\HakaksesController::class, 'update'])->name('hakakses.update');
        Route::delete('/hakakses/delete/{id}', [App\Http\Controllers\HakaksesController::class, 'destroy'])->name('hakakses.delete');

        // daftar customer
        Route::group(['prefix' => 'customer'], function ()
        {
            Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
            Route::get('/get-data', [CustomerController::class, 'getData'])->name('customer.get_data');
        });
    });

    Route::get('/blank-page', [App\Http\Controllers\HomeController::class, 'blank'])->name('blank');

    // can be deleted

    Route::get('/table-example', [App\Http\Controllers\ExampleController::class, 'table'])->name('table.example');
    Route::get('/clock-example', [App\Http\Controllers\ExampleController::class, 'clock'])->name('clock.example');
    Route::get('/chart-example', [App\Http\Controllers\ExampleController::class, 'chart'])->name('chart.example');
    Route::get('/form-example', [App\Http\Controllers\ExampleController::class, 'form'])->name('form.example');
    Route::get('/map-example', [App\Http\Controllers\ExampleController::class, 'map'])->name('map.example');
    Route::get('/calendar-example', [App\Http\Controllers\ExampleController::class, 'calendar'])->name('calendar.example');
    Route::get('/gallery-example', [App\Http\Controllers\ExampleController::class, 'gallery'])->name('gallery.example');
    Route::get('/todo-example', [App\Http\Controllers\ExampleController::class, 'todo'])->name('todo.example');
    Route::get('/contact-example', [App\Http\Controllers\ExampleController::class, 'contact'])->name('contact.example');
    Route::get('/faq-example', [App\Http\Controllers\ExampleController::class, 'faq'])->name('faq.example');
    Route::get('/news-example', [App\Http\Controllers\ExampleController::class, 'news'])->name('news.example');
    Route::get('/about-example', [App\Http\Controllers\ExampleController::class, 'about'])->name('about.example');
    // can be deleted

});
