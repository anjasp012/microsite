<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $informasi = Informasi::all();
        $data = [
            'informasi' => $informasi
        ];
        return view('admin.informasi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.informasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'body' => 'required'
        ]);

        Informasi::create([
            'judul' => $request->judul,
            'body' => $request->body
        ]);

        return redirect(route('admin.informasi.index'));
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
        $data = [
            'item' => Informasi::findOrFail($id)
        ];
        return view('admin.informasi.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required',
            'body' => 'required'
        ]);
        $item = Informasi::findOrFail($id);
        $item->update([
            'judul' => $request->judul,
            'body' => $request->body
        ]);

        return redirect(route('admin.informasi.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
