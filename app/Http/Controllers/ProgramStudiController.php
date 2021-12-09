<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Program_studi;
use Illuminate\Http\Request;

class ProgramStudiController extends Controller
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
        $program_studis =  Program_studi::all();
        return view('auth.admin.prodi.index', compact('program_studis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusans = Jurusan::all();
        return view('auth.admin.prodi.create', compact('jurusans'));
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
            'kode' => 'required|string|min:2|unique:program_studis',
        ]);
        $attr = $request->all();

        Program_studi::create($attr);

        session()->flash('success', 'Program Studi telah ditambahkan');
        return redirect(route('admin.program_studis.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Program_studi  $program_studi
     * @return \Illuminate\Http\Response
     */
    public function show(Program_studi $program_studi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Program_studi  $program_studi
     * @return \Illuminate\Http\Response
     */
    public function edit(Program_studi $program_studi)
    {
        $jurusans = Jurusan::all();
        return view('auth.admin.prodi.edit', compact('program_studi', 'jurusans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Program_studi  $program_studi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program_studi $program_studi)
    {
        $attr = $request->except('kode');

        // Cek jika data sama dan validasi
        if ($request->input('kode') !== $program_studi->kode) {
            $data = $request->validate([
                'kode' => 'required|string|min:2|unique:program_studis',
            ]);
        }
        $attr['kode'] = $request->input('kode');

        $program_studi->update($attr);

        session()->flash('success', 'Program Studi telah diedit');
        return redirect(route('admin.program_studis.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Program_studi  $program_studi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program_studi $program_studi)
    {
        $program_studi->delete();

        session()->flash('success', 'Program Studi berhasil dihapus');
        return redirect(route('admin.program_studis.index'));
    }
}
