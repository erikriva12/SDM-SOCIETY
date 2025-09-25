<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ticketing.customer';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
    'id',
    'nama',
    'alamat',
    'no_wa',
    'status',
    'nik',
    'provinsi_id',
    'kota_id',
    'kecamatan_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model)
        {
            if (empty($model->{$model->getKeyName()}))
            {
                $model->{$model->getKeyName()} = (string)Str::uuid();
            }
        });
    }

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

    // Relasi ke transaksi tiket
    public function transaksiTiket()
    {
        return $this->hasMany(TransaksiTiket::class, 'customer_id', 'customer_id');
    }
}
