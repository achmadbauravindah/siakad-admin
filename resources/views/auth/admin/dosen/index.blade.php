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

        <!-- Begin Page Content -->
        <div class="container-fluid">
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
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Dosen</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a class="btn btn-primary" type="button" href="{{ route('admin.dosens.create') }}">
                        Tambah Dosen
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIP</th>
                                    <th>Prodi</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Agama</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIP</th>
                                    <th>Prodi</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Agama</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($dosens as $dosen)
                                <tr>
                                    <th scope="row">{{ $loop->index+1 }}</th>
                                    <td>{{ $dosen->nama }}</td>
                                    <td>{{ $dosen->nip }}</td>
                                    <td>{{ $dosen->program_studi->nama_prod }}</td>
                                    <td>{{ ($dosen->jenis_kelamin == 0 ? 'Laki-laki':'Perempuan') }}</td>
                                    <td>{{ $dosen->agama->nama }}</td>
                                    <td>
                                        <a href="{{ route('admin.dosens.show', $dosen->nip) }}">Details</a>
                                        | <a href="{{ route('admin.dosens.edit', $dosen->nip) }}">Edit</a>
                                        | <a href="{{ route('admin.dosens.destroy', $dosen->nip) }}">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
