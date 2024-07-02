<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Periode;
use App\Models\Post;
use Illuminate\Http\Request;

use function Livewire\of;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'instagram' => 'required',
            'link' => 'required|unique:posts,link'
        ]);

        $periode = Periode::whereStatus(true)->first();

        if ($periode == null) {
            return back()->with('error', 'Periode telah berakhir, silahkan tunggu periode berikutnya');
        }

        if ($periode->tgl_mulai > now()) {
            return back()->with('error', 'Periode belum dimulai');
        }

        $postMingguIni = Post::where('user_id', auth()->id())
            ->where('created_at', '>=', now()->startOfWeek()) // Mulai dari awal minggu ini
            ->where('created_at', '<=', now()->endOfWeek())   // Sampai akhir minggu ini
            ->first();

        if ($postMingguIni != null) {
            auth()->user()->update([
                'point' => auth()->user()->point - $postMingguIni->point
            ]);
            $postMingguIni->delete();
        }

        auth()->user()->post()->create([
            'periode_id' => $periode->id,
            'instagram' => $request->instagram,
            'link' => $request->link,
            'point' => 0,
            'status' => false,
        ]);

        return back();
    }
}
