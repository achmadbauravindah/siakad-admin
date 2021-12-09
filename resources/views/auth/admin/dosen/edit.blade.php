@extends('layouts.admin.app')

@section('title', 'Dosen')

@section('header')

@endsection

@section('content')
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        @include('layouts.admin.topbar')


        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Edit Dosen</h1>
            <!-- DataTales Example -->
            <div class="container  w-50">
                <div class="card p-3">
                    <form action="{{ route('admin.dosens.update',$dosen->nip) }}" method="post">
                        @csrf
                        @method('patch')
                        <!-- NAMA -->
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ old('nama')?? $dosen->nama}}">
                        </div>
                        @error('nama')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <!-- NIP -->
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="text" class="form-control" id="nip" name="nip" maxlength="12"
                                value="{{ old('nip') ?? $dosen->nip}}" readonly>
                        </div>
                        @error('nip')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <!-- PRODI -->
                        <div class="form-group">
                            <label for="kode_prodi">Prodi</label>
                            <select class="form-control" name="kode_prodi" id="kode_prodi">
                                <option value="{{ $dosen->program_studi->kode }}">
                                    {{ $dosen->program_studi->nama_prod }}
                                </option>
                                @foreach ($program_studis as $program_studi)
                                <option value="{{ $program_studi->kode }}">
                                    {{ $program_studi->nama_prod }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        @error('kode_prodi')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <!-- JENIS KELAMIN -->
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <option value="{{ $dosen->jenis_kelamin }}">{{ $dosen->jenis_kelamin == 0 ?
                                "Laki-laki": "Perempuan" }}</option>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                <option value="0">Laki-laki</option>
                                <option value="1">Perempuan</option>
                            </select>
                        </div>
                        @error('jenis_kelamin')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <!-- TAHUN MASUK -->
                        <div class="form-group">
                            <label for="tahun_masuk">Tahun Masuk</label>
                            <select class="form-control" name="tahun_masuk" id="tahun_masuk">
                                <option value="{{ $dosen->tahun_masuk }}">{{ $dosen->tahun_masuk }}</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                            </select>
                        </div>
                        @error('tahun_masuk')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <!-- AGAMA -->
                        <div class="form-group">
                            <label for="kode_agama">Agama</label>
                            <select class="form-control" name="kode_agama" id="kode_agama">
                                <option value="{{ $dosen->agama->kode }}">
                                    {{ $dosen->agama->nama }}
                                </option>
                                @foreach ($agamas as $agama)
                                <option value="{{ $agama->kode }}">
                                    {{ $agama->nama }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        @error('kode_agama')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <!-- MATAKULIAH -->
                        <div class="form-group">
                            <label for="kode_matkul">Matakuliah diampu</label>
                            <select class="form-control" name="kode_matkul" id="kode_matkul">
                                <option value="{{ $dosen->matakuliah->kode }}">
                                    {{ $dosen->matakuliah->nama }}
                                </option>
                                @foreach ($matakuliahs as $matakuliah)
                                <option value="{{ $matakuliah->kode }}">
                                    {{ $matakuliah->nama }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        @error('kode_matkul')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <!-- TANGGAL LAHIR -->
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                value="{{ old('tanggal_lahir') ?? $dosen->tanggal_lahir}}">
                        </div>
                        @error('tanggal_lahir')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <!-- ALAMAT -->
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" rows="3"
                                name="alamat">{{ old('alamat') ?? $dosen->alamat}}</textarea>
                        </div>
                        @error('alamat')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <a class="btn btn-primary mt-2" type="button" href="{{ route('admin.dosens.index') }}">
                            Kembali
                        </a>
                        <button type="submit" class="btn btn-success mt-2" name="submit">Submit</button>
                    </form>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Siakad 2021</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->
@endsection

@section('script')

@endsection
