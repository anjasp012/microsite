<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            if (auth()->user()->role == 'admin') {
                return redirect()->route('admin.dashboard');
            };
        }
        $members = User::whereRole('member')->orderByDesc('point')->get();
        $data = [
            'members' => $members
        ];
        return view('home', $data);
    }
}
