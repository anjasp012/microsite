<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data =  [
            'jumlahMember' => User::whereRole('member')->count(),
            'jumlahPostingan' => Post::count(),
            'jumlahPostinganBelumDireview' => Post::whereStatus(false)->count(),
        ];
        return view('admin.dashboard', $data);
    }
}
