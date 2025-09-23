<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Customer extends Model
{
    use HasFactory, HasUuids;

    // Lokasi tabel di schema ticketing
    protected $table = 'ticketing.customer';

    // Primary key default = 'id'
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    // Tanpa fillable, semua kolom bisa mass assign
    protected $guarded = [];

    protected $casts = [
    'id' => 'string',
    ];
}
