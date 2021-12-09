<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMatakuliahRequest;
use App\Http\Requests\UpdateMatakuliahRequest;
use App\Models\Matakuliah;
use App\Models\Status_matkul;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matakuliahs =  Matakuliah::all();
        return view('auth.admin.matakuliah.index', compact('matakuliahs'));
    }

    public function indexAdmin()
    {
        $matakuliahs =  Matakuliah::all();
        return view('auth.admin.matakuliah.index', compact('matakuliahs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status_matkuls = Status_matkul::all();
        return view('auth.admin.matakuliah.create', compact('status_matkuls'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMatakuliahRequest $request)
    {
        $attr = $request->all();

        Matakuliah::create($attr);

        session()->flash('success', 'Matakuliah telah ditambahkan');
        return redirect(route('admin.matakuliahs.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function show(Matakuliah $matakuliah)
    {
        return view('auth.admin.matakuliahs.show', compact('matakuliah'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function edit(Matakuliah $matakuliah)
    {
        $status_matkuls = Status_matkul::all();
        return view('auth.admin.matakuliah.edit', compact('matakuliah', 'status_matkuls'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMatakuliahRequest $request, Matakuliah $matakuliah)
    {
        $attr = $request->except('kode');

        // Cek jika data sama dan validasi
        if ($request->input('kode') !== $matakuliah->kode) {
            $data = $request->validate([
                'kode' => 'required|string|min:6|unique:matakuliahs',
            ]);
        }
        $attr['kode'] = $request->input('kode');

        $matakuliah->update($attr);

        session()->flash('success', 'Matakuliah telah diedit');
        return redirect(route('admin.matakuliahs.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matakuliah $matakuliah)
    {
        $matakuliah->delete();

        session()->flash('success', 'Matakuliah berhasil dihapus');
        return redirect(route('admin.matakuliahs.index'));
    }
}
