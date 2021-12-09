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
            <h1 class="h3 mb-2 text-gray-800">Program Studi</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a class="btn btn-primary" type="button" href="{{ route('admin.program_studis.create') }}">
                        Tambah Program Studi
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Fakultas</th>
                                    <th>Nama Jurusan</th>
                                    <th>Nama Program Studi</th>
                                    <th>Kode</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Fakultas</th>
                                    <th>Nama Jurusan</th>
                                    <th>Nama Program Studi</th>
                                    <th>Kode</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($program_studis as $program_studi)
                                {{-- {{ dd($program_studi) }} --}}
                                <tr>
                                    <th scope="row">{{ $loop->index+1 }}</th>
                                    <td>{{ $program_studi->jurusan->fakultas->nama_fak }}</td>
                                    <td>{{ $program_studi->jurusan->nama_jur }}</td>
                                    <td>{{ $program_studi->nama_prod }}</td>

                                    <td>{{ $program_studi->kode }}</td>
                                    <td>
                                        <a
                                            href="{{ route('admin.program_studis.edit', $program_studi->kode) }}">Edit</a>
                                        @if (($program_studi->dosens)->isEmpty() &&
                                        ($program_studi->mahasiswas)->isEmpty())
                                        |
                                        <a
                                            href="{{ route('admin.program_studis.destroy', $program_studi->kode) }}">Delete</a>
                                        @endif
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
