<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Kabupaten extends Model
{
    use HasFactory;

    protected $table = 'master.kabupaten';
    protected $primaryKey = 'kabupaten_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
    'kabupaten_id',
    'provinsi_id',
    'kode',
    'nama',
    ];

    protected static function booted()
    {
        static::creating(function ($model)
        {
            if (!$model->kabupaten_id)
            {
                $model->kabupaten_id = (string)Str::uuid();
            }
        });
    }

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'provinsi_id', 'provinsi_id');
    }

    public function kecamatan()
    {
        return $this->hasMany(Kecamatan::class, 'kabupaten_id', 'kabupaten_id');
    }
}
