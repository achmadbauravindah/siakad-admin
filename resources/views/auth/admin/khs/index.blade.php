@extends('layouts.admin.app')

@section('title', 'khs Mahasiswa')

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
            <h1 class="h3 mb-2 text-gray-800">KHS Mahasiswa</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nilai Tugas</th>
                                    <th>Nilai UTS</th>
                                    <th>Nilai UAS</th>
                                    <th>Tahun Ajaran</th>
                                    <th>Matakuliah</th>
                                    <th>Mahasiswa</th>
                                    <th>Semester</th>
                                    <th>Dosen</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nilai Tugas</th>
                                    <th>Nilai UTS</th>
                                    <th>Nilai UAS</th>
                                    <th>Tahun Ajaran</th>
                                    <th>Matakuliah</th>
                                    <th>Mahasiswa</th>
                                    <th>Semester</th>
                                    <th>Dosen</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($khses as $khs)
                                <tr>
                                    <th scope="row">{{ $loop->index+1 }}</th>
                                    <td>{{ $khs->nilai_tugas }}</td>
                                    <td>{{ $khs->nilai_uts }}</td>
                                    <td>{{ $khs->nilai_uas }}</td>
                                    <td>{{ $khs->tahun_ajaran }}</td>
                                    <td>{{ $khs->matakuliah->nama }}</td>
                                    <td>{{ $khs->mahasiswa->nama }}</td>
                                    <td>{{ $khs->semester->kode }}</td>
                                    <td>{{ $khs->dosen->nama }}</td>
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
