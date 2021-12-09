<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function indexAdmin()
    {
        $fakultases =  Fakultas::all();
        return view('auth.admin.fakultas.index', compact('fakultases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.admin.fakultas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'kode' => 'required|string|min:2|unique:fakultas',
        ]);
        $attr = $request->all();

        Fakultas::create($attr);

        session()->flash('success', 'Fakultas telah ditambahkan');
        return redirect(route('admin.fakultases.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fakultas  $fakultas
     * @return \Illuminate\Http\Response
     */
    public function show(Fakultas $fakultas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fakultas  $fakultas
     * @return \Illuminate\Http\Response
     */
    public function edit(Fakultas $fakultas)
    {
        return view('auth.admin.fakultas.edit', compact('fakultas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fakultas  $fakultas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fakultas $fakultas)
    {
        $attr = $request->except('kode');

        // Cek jika data sama dan validasi
        if ($request->input('kode') !== $fakultas->kode) {
            $data = $request->validate([
                'kode' => 'required|string|min:2|unique:fakultas',
            ]);
        }
        $attr['kode'] = $request->input('kode');

        $fakultas->update($attr);

        session()->flash('success', 'Fakultas telah diedit');
        return redirect(route('admin.fakultases.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fakultas  $fakultas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fakultas $fakultas)
    {
        $fakultas->delete();

        session()->flash('success', 'Fakultas berhasil dihapus');
        return redirect(route('admin.fakultases.index'));
    }
}
