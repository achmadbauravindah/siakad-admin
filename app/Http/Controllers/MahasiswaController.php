<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;
use App\Models\Agama;
use App\Models\Khs;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\Program_studi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matakuliahs = Matakuliah::all();
        $mahasiswa = auth()->user();
        return view('mahasiswa.index', compact('mahasiswa', 'matakuliahs'));
    }

    public function indexAdmin()
    {
        $mahasiswas = Mahasiswa::all();
        return view('auth.admin.mahasiswa.index', compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $program_studis = Program_studi::all();
        $agamas = Agama::all();
        return view('auth.admin.mahasiswa.create', compact('program_studis', 'agamas'));
    }

    /**
     * Store a newly created resource in <storage class=""></storage>
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMahasiswaRequest $request)
    {
        $attr = $request->all();
        $attr['password'] = Hash::make($request->nim);

        Mahasiswa::create($attr);

        session()->flash('success', 'Mahasiswa telah ditambahkan');
        return redirect(route('admin.mahasiswas.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('auth.admin.mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        $program_studis = Program_studi::all();
        $agamas = Agama::all();
        return view('auth.admin.mahasiswa.edit', compact('mahasiswa', 'program_studis', 'agamas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMahasiswaRequest $request, Mahasiswa $mahasiswa)
    {
        $attr = $request->all();
        $attr['nim'] = $mahasiswa->nim;
        $attr['password'] = $mahasiswa->password;

        $mahasiswa->update($attr);

        session()->flash('success', 'Mahasiswa telah diedit');
        return redirect(route('admin.mahasiswas.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        session()->flash('success', 'Mahasiswa berhasil dihapus');
        return redirect(route('admin.mahasiswas.index'));
    }

    public function updatePassword()
    {
        request()->validate([
            'oldPassword' => 'required|string|min:6',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $attr = request()->all();

        $mahasiswa_nim = auth()->user()->nim;
        $mahasiswa = Mahasiswa::find($mahasiswa_nim);

        if (Hash::check(request()->oldPassword, $mahasiswa->password)) {
            $attr['password'] = Hash::make(request()->password);
            $mahasiswa->update($attr);
            return redirect()->route('mahasiswa.profile')->with('success', 'Password telah diubah');
        } else {
            return redirect()->route('mahasiswa.profile')->with('error', 'Password lama salah');
        }

        return redirect()->route('mahasiswa.profile')->with('success', 'Password telah diubah');
    }
}
