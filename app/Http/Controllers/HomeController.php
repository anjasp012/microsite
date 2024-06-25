<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $members = User::whereRole('member')->orderByDesc('point')->get();
        $data = [
            'members' => $members
        ];
        return view('home', $data);
    }
}
