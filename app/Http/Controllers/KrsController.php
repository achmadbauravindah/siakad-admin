<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Khs;
use App\Models\Krs;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class KrsController extends Controller
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
        $krses = Krs::all();

        return view('auth.admin.krs.index', compact('krses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attr = $request->all();

        $mahasiswa = auth()->user();
        $kode_matkul = $attr['kode_matkul'];
        $dosen = Dosen::where('kode_matkul', $kode_matkul)->first();

        // Store
        $attr['tahun_ajaran'] = '2020/2021';
        $attr['kode_matkul'] = $kode_matkul;
        $attr['nim_mahasiswa'] = $mahasiswa->nim;
        $attr['kode_semester'] = '5';
        $attr['nip_dosen'] = $dosen->nip;

        Krs::create($attr);

        session()->flash('success', 'KRS telah ditambahkan');
        return redirect(route('mahasiswa.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Krs  $krs
     * @return \Illuminate\Http\Response
     */
    public function show(Krs $krs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Krs  $krs
     * @return \Illuminate\Http\Response
     */
    public function edit(Krs $krs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Krs  $krs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Krs $krs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Krs  $krs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Krs $krs)
    {
        $krs->delete();

        session()->flash('success', 'KRS berhasil dihapus');
        return redirect(route('mahasiswa.index'));
    }
}
