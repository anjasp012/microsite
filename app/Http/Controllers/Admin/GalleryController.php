<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'galleries' => Gallery::all(),
        ];
        return view('admin.galley.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.galley.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file'
        ]);

        $foto = "image-" . Str::random(10) . '.' . $request->file('file')->extension();
        $request->file('file')->storeAs('public/gallery/', $foto);
        $file = $foto;

        Gallery::create([
            'file' => $file,
        ]);

        return redirect(route('admin.gallery.index'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gallery  = Gallery::findOrFail($id);
        Storage::delete('public/gallery/' . $gallery->file);
        $gallery->delete();
        return back();
    }
}
