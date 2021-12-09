<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
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
        $jurusans =  Jurusan::all();
        return view('auth.admin.jurusan.index', compact('jurusans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fakultases = Fakultas::all();
        return view('auth.admin.jurusan.create', compact('fakultases'));
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
            'kode' => 'required|string|min:2|unique:jurusans',
        ]);
        $attr = $request->all();

        Jurusan::create($attr);

        session()->flash('success', 'Jurusan telah ditambahkan');
        return redirect(route('admin.jurusans.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function show(Jurusan $jurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jurusan $jurusan)
    {
        $fakultases = Fakultas::all();
        return view('auth.admin.jurusan.edit', compact('jurusan', 'fakultases'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        $attr = $request->except('kode');

        // Cek jika data sama dan validasi
        if ($request->input('kode') !== $jurusan->kode) {
            $data = $request->validate([
                'kode' => 'required|string|min:2|unique:jurusans',
            ]);
        }
        $attr['kode'] = $request->input('kode');

        $jurusan->update($attr);

        session()->flash('success', 'Jurusan telah diedit');
        return redirect(route('admin.jurusans.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();

        session()->flash('success', 'Fakultas berhasil dihapus');
        return redirect(route('admin.jurusans.index'));
    }
}
