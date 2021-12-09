<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStatus_matakulRequest;
use App\Http\Requests\UpdateStatus_matakulRequest;
use App\Models\Status_matkul;
use Illuminate\Http\Request;

class StatusMatkulController extends Controller
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
        $status_matkuls = Status_matkul::all();
        return view('auth.admin.status_matkul.edit', compact('status_matkuls'));
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
    public function store(StoreStatus_matakulRequest $request)
    {
        $attr = request()->all();

        Status_matkul::create($attr);
        return redirect()->route('admin.status_matkuls.index')
            ->with('success', 'Status matakuliah berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Status_matkul  $status_matkul
     * @return \Illuminate\Http\Response
     */
    public function show(Status_matkul $status_matkul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Status_matkul  $status_matkul
     * @return \Illuminate\Http\Response
     */
    public function edit(Status_matkul $status_matkul)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Status_matkul  $status_matkul
     * @return \Illuminate\Http\Response
     */
    public function updateAndDelete(UpdateStatus_matakulRequest $request, $id)
    {
        $status_matkul = Status_matkul::find($id);
        if ($status_matkul) {
            if (request()->update) {
                $attr = request()->all();
                $status_matkul->update($attr);
                return redirect()->route('admin.status_matkuls.index')->with('success', 'Status Matakuliah Berhasil Diedit');
            } else if (request()->delete) {
                $status_matkul->delete();
                return redirect()->route('admin.status_matkuls.index')->with('success', 'Status Matakuliah Berhasil Dihapus');
            }
        } else {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Status_matkul  $status_matkul
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status_matkul $status_matkul)
    {
        //
    }
}
