<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Provinsi extends Model
{
    use HasFactory;

    protected $table = 'master.provinsi';
    protected $primaryKey = 'provinsi_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
    'provinsi_id',
    'kode',
    'nama',
    ];

    // Generate UUID otomatis saat create
    protected static function booted()
    {
        static::creating(function ($model)
        {
            if (!$model->provinsi_id)
            {
                $model->provinsi_id = (string)Str::uuid();
            }
        });
    }

    public function kabupaten()
    {
        return $this->hasMany(Kabupaten::class, 'provinsi_id', 'provinsi_id');
    }
}
