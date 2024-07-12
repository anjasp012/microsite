<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriBulanan extends Model
{
    use HasFactory;

    protected $table = 'histori_poin_bulanan';

    protected $guarded = ['id'];

    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }
}
