<?php

namespace App\Http\Controllers;

use App\Events\LogVisitor;
use App\Models\Gallery;
use App\Models\HistoriBulanan;
use App\Models\Informasi;
use App\Models\Periode;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Stevebauman\Location\Facades\Location;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $ipAddress = $request->ip();
        $url = $request->fullUrl();

        // Detect device and browser
        $agent = new Agent();
        $agent->setUserAgent($request->header('User-Agent'));
        $device = $agent->device();
        $browser = $agent->browser();

        // Get country from IP address
        $country = null;
        try {
            $position = Location::get($ipAddress);
            $country = $position->countryName ?? null;
        } catch (\Exception $e) {
            // Handle exception
        }

        // Trigger LogVisitor event
        event(new LogVisitor($ipAddress, $url, $country, $device, $browser));

        $data = [];
        if (auth()->check()) {
            if (auth()->user()->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                $periodeSaatIni = Periode::whereStatus(true)->first();

                if ($periodeSaatIni) {
                    $postMingguIni = Post::where('user_id', auth()->id())
                        ->where('periode_id', $periodeSaatIni->id)
                        ->where('created_at', '>=', now()->startOfWeek()) // Mulai dari awal minggu ini
                        ->where('created_at', '<=', now()->endOfWeek())   // Sampai akhir minggu ini
                        ->first();
                    $data += [
                        'postMingguIni' => $postMingguIni
                    ];
                }
            }
        }
        $periode = Periode::whereStatus(true)->first();
        $members = User::whereRole('member')->orderByDesc('point')->get();
        $updated = User::whereRole('member')->orderByDesc('updated_at')->first();
        $galleries = Gallery::all();
        $data += [
            'members' => $members,
            'periode' => $periode,
            'updated' => $updated,
            'galleries' => $galleries,
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

    public function postinganSaya()
    {
        $data = [
            'postingan' => auth()->user()->post()->get(),
        ];
        return view('postingan-saya', $data);
    }

    public function historiPoin()
    {
        $data = [
            'histori' => HistoriBulanan::whereUserId(auth()->id())->get(),
        ];
        return view('histori-poin', $data);
    }
}
