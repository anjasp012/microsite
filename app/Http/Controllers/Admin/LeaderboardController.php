<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function index()
    {
        $leaderboard = User::whereRole('member')->orderByDesc('point')->get();
        $data = [
            'leaderboard' => $leaderboard
        ];
        return view('admin.leaderboard.index', $data);
    }
}
