<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'customer';
    protected $primaryKey = 'id';

    protected $fillable = [
    'nama',
    'alamat',
    'no_wa',
    'status',
    'nik',
    'provinsi_id',
    'kota_id',
    'kecamatan_id',
    'desa_id',
    ];


    // Relasi ke master wilayah
    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'provinsi_id', 'provinsi_id');
    }

    public function kota()
    {
        return $this->belongsTo(Kabupaten::class, 'kota_id', 'kabupaten_id');
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id', 'kecamatan_id');
    }
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id', 'desa_id');
    }

    // Relasi ke transaksi tiket
    public function transaksiTiket()
    {
        return $this->hasMany(TransaksiTiket::class, 'id', 'customer_id');
    }
}
