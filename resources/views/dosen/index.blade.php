@extends('layouts.app')

@section('title', 'Dosen')

@section('header')

@endsection

@section('content')
<!-- Masthead-->
<header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">{{ auth()->user()->nama }}</h1>
        </h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <span class="material-icons">
                    people
                </span>
            </div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0">Monitoring KRS dan KHS
        </p>
    </div>
</header>
<!-- Matakuliah Section-->
<section class="page-section" id="krs">
    <div class="container">
        <!-- Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">KRS</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Grid Items-->
        <div class="row justify-content-center">
            <div class="card p-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Matakuliah</th>
                            <th scope="col">SKS</th>
                            <th scope="col">Mahasiswa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dosen->krses as $krs)
                        <tr>
                            <th scope="row">{{ $loop->index+1 }}</th>
                            <td>{{ $krs->kode_matkul }}</td>
                            <td>{{ $krs->matakuliah->nama }}</td>
                            <td>{{ $krs->matakuliah->sks}}</td>
                            <td>{{ $krs->mahasiswa->nama }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- About Section-->
<section class="page-section bg-primary text-white mb-0" id="khs">
    <div class="container">
        <!-- About Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-white">KHS</h2>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- About Section Content-->
        <div class="row">
            <div class="card p-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Mahasiswa</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Matakuliah</th>
                            <th scope="col">SKS</th>
                            <th scope="col">Nilai Akhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dosen->khses as $khs)
                        <tr>
                            <th scope="row">{{ $loop->index+1 }}</th>
                            <td>{{ $khs->mahasiswa->nama }}</td>
                            <td>{{ $khs->kode_matkul }}</td>
                            <td>{{ $khs->matakuliah->nama }}</td>
                            <td>{{ $khs->matakuliah->sks}}</td>
                            <td>{{ ($khs->nilai_tugas + $khs->nilai_uts + $khs->nilai_uas) / 3}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- FLASH MESSAGE -->
@if(session()->has('success'))
<div class="text-success  mt-4">
    <h3 class="page-section-heading text-center text-uppercase text-success mb-0">
        {{ session()->get('success') }}
    </h3>

</div>
@endif

@if(session()->has('error'))
<div class="text-danger mt-4">
    <h3 class="page-section-heading text-center text-uppercase text-danger mb-0">
        {{ session()->get('error') }}
    </h3>
</div>
@endif
<!-- Section-->
<section class="page-section" id="profile">
    <div class="container">
        <!-- Profile Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Profile</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Profile Section -->
        <div class="row ">

            <div class="col-md-6 mx-auto">
                <div class="d-flex flex-row bd-highlight mb-3 ">
                    <div class="p-2 bd-highlight fw-bold h2 ">Nama:</div>
                    <div class="p-2 bd-highlight h2 text-primary">{{ $dosen->nama }}</div>
                </div>
                <div class="d-flex flex-row bd-highlight mb-3 ">
                    <div class="p-2 bd-highlight fw-bold h2 ">NIP:</div>
                    <div class="p-2 bd-highlight h2 text-primary">{{ $dosen->nip }}</div>
                </div>
                <div class="d-flex flex-row bd-highlight mb-3 ">
                    <div class="p-2 bd-highlight fw-bold h2 ">Prodi:</div>
                    <div class="p-2 bd-highlight h2 text-primary">{{ $dosen->program_studi->nama_prod }}</div>
                </div>
                <div class="d-flex flex-row bd-highlight mb-3 ">
                    <div class="p-2 bd-highlight fw-bold h2 ">Alamat:</div>
                    <div class="p-2 bd-highlight h2 text-primary">{{ $dosen->alamat }}</div>
                </div>
            </div>
        </div>
        <hr>
        <!-- Pass Section -->
        <div class="row justify-content-center">
            <div class="col-md-4 text-center">
                <form action="{{ route('dosen.updatePassword') }}" method="post">
                    @csrf
                    @method('patch')
                    <label for="password" class="form-control mt-2">Ganti password:</label>
                    <input name="oldPassword" type="text" placeholder="current password " class="form-control mt-2">
                    @error('oldPassword')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <input name="password" type="text" placeholder="password" class="form-control mt-2">
                    @error('password')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <input name="password_confirmation" type="text" placeholder="confirm password"
                        class="form-control mt-2" autocomplete="new-password">
                    @error('password_confirmation')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="submit" value="Submit" class="form-control mt-2 btn-primary">
                </form>
            </div>
        </div>
    </div>
    </div>
</section>

<!-- Copyright Section-->
<div class="copyright py-4 text-center text-white">
    <div class="container"><small>Copyright &copy; Your Website 2021</small></div>
</div>
@endsection
