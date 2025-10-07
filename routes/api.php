<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;


Route::withoutMiddleware(['auth'])->group(function ()
{
Route::middleware([])->group(function () {
    Route::post('store-pemesanan', [WebsiteController::class, 'storepemesanan']);
    Route::get('detail-pesanan/{kodeTransaksi}', [WebsiteController::class, 'detailPembayaran']);
});
   
});
