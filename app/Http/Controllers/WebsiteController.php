<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Desa;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use App\Models\TransaksiTiket;
use Illuminate\Queue\Console\ForgetFailedCommand;
use Illuminate\Support\Facades\DB;

class WebsiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['store']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('web.index');
    }

    public function orderTicket()
    {
        return view('web.order-ticket');
    }
    public function getProvinsi(Request $request)
    {
        $search = $request->input('term');

        $query = Provinsi::query();
        if (!empty($search))
        {
            $query->where('nama', 'ILIKE', "%{$search}%"); // PostgreSQL
            // kalau pakai MySQL → ganti LIKE
        }

        $provinsi = $query->orderBy('nama')->get();

        $results = $provinsi->map(fn($item) => [
            'id' => $item->provinsi_id,
            'text' => $item->nama
        ]);

        return response()->json($results);
    }

    public function getKabupaten(Request $request, $provinsi_id)
    {
        $search = $request->input('term');

        $query = Kabupaten::where('provinsi_id', $provinsi_id);
        if (!empty($search))
        {
            $query->where('nama', 'ILIKE', "%{$search}%");
        }

        $kabupaten = $query->orderBy('nama')->get();

        $results = $kabupaten->map(fn($item) => [
            'id' => $item->kabupaten_id,
            'text' => $item->nama
        ]);

        return response()->json($results);
    }

    public function getKecamatan(Request $request, $kabupaten_id)
    {
        $search = $request->input('term');

        $query = Kecamatan::where('kabupaten_id', $kabupaten_id);
        if (!empty($search))
        {
            $query->where('nama', 'ILIKE', "%{$search}%");
        }

        $kecamatan = $query->orderBy('nama')->get();

        $results = $kecamatan->map(fn($item) => [
            'id' => $item->kecamatan_id,
            'text' => $item->nama
        ]);

        return response()->json($results);
    }
    public function getDesa(Request $request, $kecamatan_id)
    {
        $search = $request->input('term');

        $query = Desa::where('kecamatan_id', $kecamatan_id);
        if (!empty($search))
        {
            $query->where('nama', 'ILIKE', "%{$search}%");
        }

        $kecamatan = $query->orderBy('nama')->get();

        $results = $kecamatan->map(fn($item) => [
            'id' => $item->desa_id,
            'text' => $item->nama
        ]);

        return response()->json($results);
    }


    public function storepemesanan(Request $request)
    {
        DB::beginTransaction();
        try
        {
            // Simpan / update customer berdasarkan no_wa
            $dataCustomer = Customer::updateOrCreate(
                ['no_wa' => $request->no_wa],
                [
                    'nama' => $request->nama,
                    'alamat' => $request->alamat,
                    'status' => $request->status ?? true,
                    'nik' => $request->nik,
                    'provinsi_id' => $request->provinsi_id,
                    'kota_id' => $request->kota_id,
                    'kecamatan_id' => $request->kecamatan_id,
                    'desa_id' => $request->desa_id,
                ]
            );

            // Tentukan harga tiket
            $hargaTiket = 65000;
            $jumlahTiket = (int)$request->quantity;
            $totalBayar = $hargaTiket * $jumlahTiket;

            // Hitung urutan transaksi hari ini
            $today = now()->format('Y-m-d');
            $lastTransaksi = TransaksiTiket::whereDate('created_at', $today)
                ->orderByDesc('urutan_kode_transaksi')
                ->first();

            $urutan = $lastTransaksi ? $lastTransaksi->urutan_kode_transaksi + 1 : 1;

            // Buat kode transaksi
            $kodeTransaksi = 'TIKET-' . now()->format('Ymd') . '-' . str_pad($urutan, 4, '0', STR_PAD_LEFT);

            // Simpan transaksi tiket
            $dataPemesananTiket = TransaksiTiket::create([
                'customer_id' => $dataCustomer->id,
                'jumlah_tiket' => $jumlahTiket,
                'harga_tiket' => $hargaTiket,
                'total_bayar' => $totalBayar,
                'status_bayar' => 'Unpaid',
                'kode_transaksi' => $kodeTransaksi,
                'urutan_kode_transaksi' => $urutan,
            ]);

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Pemesanan berhasil disimpan',
                'data' => [
                    'customer' => $dataCustomer,
                    'transaksi' => $dataPemesananTiket
                ]
            ], 201);

        }
        catch (\Exception $e)
        {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan saat menyimpan',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    
    public function detailPembayaran($kodeTransaksi)
    {
        $data = [
            'transaksi' => TransaksiTiket::with('customer',
            'customer.provinsi',
            'customer.kota',
            'customer.kecamatan',
            'customer.desa',
            )->where('kode_transaksi', $kodeTransaksi)->firstOrFail(),
        ];
        return view('web.pembayaran-detail')->with($data);
    }
    public function pembayaran($kodeTransaksi)
    {
        $data = [
            'transaksi' => TransaksiTiket::with('customer',
            'customer.provinsi',
            'customer.kota',
            'customer.kecamatan',
            'customer.desa',
            )->where('kode_transaksi', $kodeTransaksi)->firstOrFail(),
        ];
        return view('web.pembayaran')->with($data);
    }


}
