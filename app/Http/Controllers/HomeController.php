<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\Periode;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [];
        if (auth()->check()) {
            if (auth()->user()->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                $postMingguIni = Post::where('user_id', auth()->id())
                    ->where('created_at', '>=', now()->startOfWeek()) // Mulai dari awal minggu ini
                    ->where('created_at', '<=', now()->endOfWeek())   // Sampai akhir minggu ini
                    ->first();
                $data += [
                    'postMingguIni' => $postMingguIni
                ];
            }
        }
        $periode = Periode::whereStatus(true)->first();
        $members = User::whereRole('member')->orderByDesc('point')->get();
        $data += [
            'members' => $members,
            'periode' => $periode,
        ];
        return view('home', $data);
    }

    public function informasi()
    {
        $data = [
            'informasi' => Informasi::whereStatus(true)->get()
        ];
        return view('informasi', $data);
    }
}
