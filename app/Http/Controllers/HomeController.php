<?php

namespace App\Http\Controllers;

use App\Models\TransaksiTiket;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function updatePembayaran()
    {
        $data = [
            'unpaid' => TransaksiTiket::where('status_bayar', 'Unpaid')->get(),
        ];
        return view('update_pembayaran')->with($data);
    }
    public function detailTransaksi($transaksiId)
    {
        $transaksi = TransaksiTiket::with('customer')->findOrFail($transaksiId);

        return view('detail_transaksi', compact('transaksi'));
    }
    public function updateStatus(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:transaksi_tiket,transaksi_tiket_id',
            'status_bayar' => 'required|in:unpaid,paid,pending,cancelled'
        ]);

        $transaksi = TransaksiTiket::findOrFail($request->id);
        $transaksi->status_bayar = $request->status_bayar;
        $transaksi->save();

        return response()->json([
            'success' => true,
            'message' => 'Status pembayaran berhasil diperbarui.',
            'data' => $transaksi
        ]);
    }


    public function blank()
    {
        return view('layouts.blank-page');
    }
}
