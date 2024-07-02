<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Periode;
use App\Models\User;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function index()
    {
        $leaderboard = User::whereRole('member')->orderByDesc('point')->get();
        $periode = Periode::whereStatus(true)->first();
        $data = [
            'leaderboard' => $leaderboard,
            'periode' => $periode
        ];
        return view('admin.leaderboard.index', $data);
    }
}
