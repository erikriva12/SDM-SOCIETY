<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Kecamatan extends Model
{
    use HasFactory;

    protected $table = 'master.kecamatan';
    protected $primaryKey = 'kecamatan_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
    'kecamatan_id',
    'kabupaten_id',
    'kode',
    'nama',
    ];

    protected static function booted()
    {
        static::creating(function ($model)
        {
            if (!$model->kecamatan_id)
            {
                $model->kecamatan_id = (string)Str::uuid();
            }
        });
    }

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'kabupaten_id', 'kabupaten_id');
    }
}
