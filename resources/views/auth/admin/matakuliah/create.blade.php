@extends('layouts.admin.app')

@section('title', 'Matakuliah')

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
            <h1 class="h3 mb-2 text-gray-800">Tambah Matakuliah</h1>
            <!-- DataTales Example -->
            <div class="container  w-50">
                <div class="card p-3">
                    <form action="{{ route('admin.matakuliahs.store') }}" method="POST">
                        @csrf
                        @method('post')
                        <!-- NAMA -->
                        <div class="form-group">
                            <label for="nama">Nama Matakuliah</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama')}}">
                        </div>
                        @error('nama')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <!-- KODE -->
                        <div class="form-group">
                            <label for="kode">Kode</label>
                            <input type="text" class="form-control" id="kode" name="kode" maxlength="6"
                                value="{{ old('kode')}}">
                        </div>
                        @error('kode')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <!-- SKS -->
                        <div class="form-group">
                            <label for="sks">Jumlah SKS</label>
                            <input type="text" class="form-control" id="sks" name="sks" maxlength="1"
                                value="{{ old('sks')}}">
                        </div>
                        @error('sks')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <!-- STATUS MATAKULIAH -->
                        <div class="form-group">
                            <label for="kode_status_matkul">Status Matakuliah</label>
                            <select class="form-control" name="kode_status_matkul" id="kode_status_matkul">
                                @foreach ($status_matkuls as $status_matkul)
                                <option value="{{ $status_matkul->kode }}">
                                    {{ $status_matkul->nama }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        @error('kode_status_matkul')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <a class="btn btn-primary mt-2" type="button" href="{{ route('admin.matakuliahs.index') }}">
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
