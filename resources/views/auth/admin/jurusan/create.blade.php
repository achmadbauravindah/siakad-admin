@extends('layouts.admin.app')

@section('title', 'Jurusan')

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
            <h1 class="h3 mb-2 text-gray-800">Tambah Jurusan</h1>
            <!-- DataTales Example -->
            <div class="container  w-50">
                <div class="card p-3">
                    <form action="{{ route('admin.jurusans.store') }}" method="POST">
                        @csrf
                        @method('post')
                        <!-- FAKULTAS -->
                        <div class="form-group">
                            <label for="kode_fak">Pilihan Fakultas</label>
                            <select class="form-control" name="kode_fak" id="kode_fak">
                                @foreach ($fakultases as $fakultas)
                                <option value="{{ $fakultas->kode }}">
                                    {{ $fakultas->nama_fak }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        @error('kode_fak')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <!-- Nama -->
                        <div class="form-group">
                            <label for="nama_jur">Nama</label>
                            <input type="text" class="form-control" id="nama_jur" name="nama_jur"
                                value="{{ old('nama_jur')}}" required>
                        </div>
                        @error('nama_jur')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <!-- KODE -->
                        <div class="form-group">
                            <label for="kode">Kode</label>
                            <input type="text" class="form-control" id="kode" name="kode" maxlength="2"
                                value="{{ old('kode')}}">
                        </div>
                        @error('kode')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror


                        <a class="btn btn-primary mt-2" type="button" href="{{ route('admin.jurusans.index') }}">
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
