<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HistoriBulanan;
use App\Models\HistoriMingguan;
use App\Models\Periode;
use App\Models\User;
use App\Models\Week;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeriodeController extends Controller
{
    public function store(Request $request)
    {
        $periodeSebelumnyaAktif = Periode::where('status', '1')->first();
        if ($periodeSebelumnyaAktif != null) {
            return back()->with('error', 'stop periode sebelumnya sebelum memulai periode baru');
        }
        Periode::create([
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_berakhir' => $request->tgl_berakhir,
            'status' => true
        ]);
        return back();
    }

    public function stop()
    {
        $periodeSaatIni = Periode::latest()->first();
        $member = User::whereRole('member')->get();
        $week = HistoriMingguan::select('user_id', DB::raw('SUM(point) as point'))
            ->where('periode_id', $periodeSaatIni->id)
            ->groupBy('user_id')
            ->get();


        foreach ($week as $item) {
            HistoriBulanan::create([
                'periode_id' => $periodeSaatIni->id,
                'user_id' => $item->user_id,
                'point' => $item->point
            ]);
        }

        foreach ($member as $item) {
            $item->update([
                'point' => 0
            ]);
        }

        $periodeSaatIni->update([
            'status' => false
        ]);
        return back();
    }
}
