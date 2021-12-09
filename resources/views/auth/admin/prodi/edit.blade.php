@extends('layouts.admin.app')

@section('title', 'Program Studi')

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
            <h1 class="h3 mb-2 text-gray-800">Edit Program Studi</h1>
            <!-- DataTales Example -->
            <div class="container  w-50">
                <div class="card p-3">
                    <form action="{{ route('admin.program_studis.update',$program_studi->kode) }}" method="post">
                        @csrf
                        @method('patch')
                        <!-- JURUSAN -->
                        <div class="form-group">
                            <label for="kode_jur">Pilihan Jurusan</label>
                            <select class="form-control" name="kode_jur" id="kode_jur">
                                <option value="{{ $program_studi->jurusan->kode }}">
                                    {{ $program_studi->jurusan->nama_jur }}
                                </option>
                                @foreach ($jurusans as $jurusan)
                                <option value="{{ $jurusan->kode }}">
                                    {{ $jurusan->nama_jur }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        @error('kode_jur')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <!-- NAMA -->
                        <div class="form-group">
                            <label for="nama_prod">Nama</label>
                            <input type="text" class="form-control" id="nama_prod" name="nama_prod"
                                value="{{ old('nama_prod')?? $program_studi->nama_prod}}" required>
                        </div>
                        @error('nama_prod')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <!-- KODE -->
                        <div class="form-group">
                            <label for="kode">Kode</label>
                            <input type="text" class="form-control" id="kode" name="kode" maxlength="2"
                                value="{{ old('kode') ?? $program_studi->kode}}" readonly>
                        </div>
                        @error('kode')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <a class="btn btn-primary mt-2" type="button" href="{{ route('admin.program_studis.index') }}">
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
