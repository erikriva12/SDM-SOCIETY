<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Provinsi extends Model
{
    use HasFactory;

    protected $table = 'provinsi';
    protected $primaryKey = 'provinsi_id';

    protected $fillable = [
    'provinsi_id',
    'kode',
    'nama',
    ];



    public function kabupaten()
    {
        return $this->hasMany(Kabupaten::class, 'provinsi_id', 'provinsi_id');
    }
}
