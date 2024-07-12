<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HistoriMingguan;
use App\Models\Periode;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        $data = [
            'posts' => $posts
        ];
        return view('admin.post.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'point' => 'required'
        ]);
        $post = Post::findOrFail($id);
        if ($post->point != $request->point) {
            $post->update([
                'point' => $request->point,
                'status' => 1
            ]);
            $user = User::findOrFail($post->user_id);
            $user->update([
                'point' => $user->point + $request->point
            ]);

            $periodeSaatIni = Periode::latest()->first();
            $historiMingguIni = HistoriMingguan::wherePostId($post->id)->first();
            if ($historiMingguIni != null) {
                $historiMingguIni->update([
                    'point' => $request->point,
                ]);
            } else {
                HistoriMingguan::create([
                    'periode_id' => $periodeSaatIni->id,
                    'post_id' => $post->id,
                    'point' => $request->point,
                    'user_id' => $user->id
                ]);
            }
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
