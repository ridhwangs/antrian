<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    use HasFactory;
    protected $table = 'data_antrian';
    protected $fillable = [
        'antrian_id',
        'jenis_id',
        'dealerID',
        'nomor',
    ];
}
