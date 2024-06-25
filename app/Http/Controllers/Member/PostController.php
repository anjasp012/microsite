<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'instagram' => 'required',
            'link' => 'required|unique:posts,link'
        ]);

        auth()->user()->post()->create([
            'instagram' => $request->instagram,
            'link' => $request->link,
            'point' => 0,
            'status' => false,
        ]);

        return back();
    }
}
