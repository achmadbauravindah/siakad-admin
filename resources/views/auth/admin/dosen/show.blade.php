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
            <h1 class="h3 mb-2 text-gray-800">Lihat Dosen</h1>
            <!-- DataTales Example -->
            <div class="container  w-50">
                <div class="card p-3">
                    <form>
                        <!-- NAMA -->
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $dosen->nama }}"
                                readonly>
                        </div>
                        <!-- NIP -->
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="text" class="form-control" id="nip" name="nip" maxlength="12"
                                value="{{ $dosen->nip }}" readonly>
                        </div>
                        <!-- PRODI -->
                        <div class="form-group">
                            <label for="kode_prodi">Prodi</label>
                            <input type="text" class="form-control" id="kode_prodi" name="kode_prodi" maxlength="12"
                                value="{{ $dosen->program_studi->nama_prod }}" readonly>
                        </div>
                        <!-- JENIS KELAMIN -->
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin"
                                value="{{ (($dosen->jenis_kelamin) == 0 ? 'Laki-laki' : 'Perempuan' ) }}" readonly>
                        </div>
                        <!-- AGAMA -->
                        <div class="form-group">
                            <label for="kode_agama">Agama</label>
                            <input type="text" class="form-control" id="kode_agama" name="kode_agama"
                                value="{{ $dosen->agama->nama }}" readonly>
                        </div>
                        <!-- TANGGAL LAHIR -->
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                value="{{ $dosen->tanggal_lahir }}" readonly>
                        </div>
                        <!-- ALAMAT -->
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input class="form-control" id="alamat" rows="3" name="alamat" value="{{ $dosen->alamat
                            }}" readonly>
                        </div>
                        <a class="btn btn-primary mt-2 " type="button" href="{{ route('admin.dosens.index') }}">
                            Kembali
                        </a>
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
