@extends('layouts.admin.app')

@section('title', 'status_matkul')

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
            <h1 class="h3 mb-2 text-gray-800">Edit Status Matakuliah</h1>
            <!-- FLASH MESSAGE -->
            @if(session()->has('success'))
            <div class="alert alert-success mt-4">
                {{ session()->get('success') }}
            </div>
            @endif

            @if(session()->has('error'))
            <div class="alert alert-danger mt-4">
                {{ session()->get('error') }}
            </div>
            @endif
            <!-- DataTales Example -->
            <div class="card p-3 ">

                <div class="container w-50">

                    <!-- Ubah status_matkul -->
                    <h5>Ubah Status Matkul</h5>
                    @foreach ($status_matkuls as $status_matkul)
                    {{-- <p>Jam Berangkat: 21:37:00</p> --}}
                    <form action="{{route('admin.status_matkuls.update_delete', $status_matkul->kode)}}" method="POST"
                        class="mb-3 row g-1">
                        @method('put')
                        @csrf
                        <div class="col-md-5 ">
                            <input type="text" class="form-control" id="name" name="nama"
                                value="{{$status_matkul->nama}}" />
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="kode" value="{{$status_matkul->kode}}"
                                readonly />
                        </div>
                        <div class="col-md-2">
                            <button type=" submit" value="Update" name="update" class="btn btn-success">Update</button>
                        </div>
                        @if (($status_matkul->matakuliahs)->isEmpty())
                        <div class="col-md-2">
                            <button type="submit" value="Delete" name="delete" class="btn btn-danger">Delete</button>
                        </div>
                        @endif
                    </form>
                    @endforeach
                </div>
                <!-- Akhir Ubah status_matkul -->

                <!-- Tambah status_matkul Baru -->
                <h5 class="mt-5">Tambah Status Matakuliah</h5>
                <form action="{{route('admin.status_matkuls.store')}}" method="POST" class="row g-1">
                    @csrf
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="name" name="nama"
                            placeholder="Nama Status Matkul" />
                    </div>
                    @error('nama')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="kode" placeholder="Kode Matakuliah"
                            maxlength="1" />
                    </div>
                    @error('kode')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Create New</button>
                    </div>
                </form>
            </div>

            <a class="btn btn-warning ml-3 mt-3" type="button" href="{{ route('admin.matakuliahs.index') }}">
                Kembali
            </a>

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
