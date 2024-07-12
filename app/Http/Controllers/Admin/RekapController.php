<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HistoriBulanan;
use App\Models\HistoriMingguan;
use App\Models\Periode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekapController extends Controller
{
    public function rekapMingguan()
    {
        $data = [
            'mingguan' => HistoriMingguan::select(
                'user_id',
                DB::raw('SUM(point) as point'),
                DB::raw('(SELECT ANY_VALUE(created_at) FROM histori_poin_mingguan WHERE histori_poin_mingguan.user_id = user_id GROUP BY user_id) as created_at'),
                DB::raw('ANY_VALUE(periode.tgl_mulai) as tgl_mulai'),
                DB::raw('ANY_VALUE(periode.tgl_berakhir) as tgl_berakhir')
            )
                ->leftJoin('periode', 'histori_poin_mingguan.periode_id', '=', 'periode.id')
                ->groupBy('user_id')
                ->get(),
        ];




        dd($data);
        return view('admin.rekap.mingguan', $data);
    }
    public function rekapBulanan()
    {
        $data = [
            'periode' =>  Periode::whereStatus(false)->get(),
        ];

        return view('admin.rekap.bulanan', $data);
    }
    public function rekapBulananShow($id)
    {
        $data = [
            'periode' => Periode::find($id)->first(),
            'poin' =>  HistoriBulanan::wherePeriodeId($id)->get(),
        ];

        return view('admin.rekap.bulanan.show', $data);
    }
}
