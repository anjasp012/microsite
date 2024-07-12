<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriMingguan extends Model
{
    use HasFactory;

    protected $table = 'histori_poin_mingguan';

    protected $guarded = ['id'];

    public function periode()
    {
        return $this->belongsTo(Periode::class, 'periode_id');
    }
}
