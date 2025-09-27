<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class TransaksiTiket extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'transaksi_tiket';
    protected $primaryKey = 'transaksi_tiket_id';

    protected $fillable = [
    'transaksi_tiket_id',
    'customer_id',
    'jumlah_tiket',
    'harga_tiket',
    'total_bayar',
    'status_bayar',
    'kode_transaksi',
    'urutan_kode_transaksi',
    ];

    // Relasi ke Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }
}