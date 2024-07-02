<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Periode;
use App\Models\User;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    public function store(Request $request)
    {
        $periodeSebelumnya = Periode::all();
        if ($periodeSebelumnya->count() > 0) {
            foreach ($periodeSebelumnya as $peroode) {
                $periodeSebelumnya->update([
                    'status' => false
                ]);
            }
        }
        Periode::create([
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_berakhir' => $request->tgl_berakhir,
            'status' => true
        ]);

        $member = User::whereRole('member')->get();

        foreach ($member as $item) {
            $item->update([
                'point' => 0
            ]);
        }
        return back();
    }
}
