<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tmp extends Model
{
    use HasFactory;
    protected $table = 'tmp_antrian';
    protected $fillable = [
        'jenis_id',
        'dealerID',
        'nomor',
        'last_update',
    ];
}
