@extends('layouts.admin.app')

@section('title', 'Fakultas')

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
            <h1 class="h3 mb-2 text-gray-800">Tambah Fakultas</h1>
            <!-- DataTales Example -->
            <div class="container  w-50">
                <div class="card p-3">
                    <form action="{{ route('admin.fakultases.store') }}" method="POST">
                        @csrf
                        @method('post')
                        <!-- Nama -->
                        <div class="form-group">
                            <label for="nama_fak">Nama</label>
                            <input type="text" class="form-control" id="nama_fak" name="nama_fak"
                                value="{{ old('nama_fak')}}" required>
                        </div>
                        @error('nama_fak')
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

                        <a class="btn btn-primary mt-2" type="button" href="{{ route('admin.fakultases.index') }}">
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
