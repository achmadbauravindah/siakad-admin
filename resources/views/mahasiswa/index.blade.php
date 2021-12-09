@extends('layouts.app')

@section('title', 'Mahasiswa')

@section('header')

@endsection

@section('content')
<!-- Masthead-->
<header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">{{ auth()->guard('mahasiswa')->user()->nama }}</h1>
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
        <p class="masthead-subheading font-weight-light mb-0">Silahkan Atur KRS dan KHS
        </p>
    </div>
</header>
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
<!-- KRS Section-->
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
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mahasiswa->krses as $krs)
                        <tr>
                            <th scope="row">{{ $loop->index+1 }}</th>
                            <td>{{ $krs->kode_matkul }}</td>
                            <td>{{ $krs->matakuliah->nama }}</td>
                            <td>{{ $krs->matakuliah->sks}}</td>
                            <td>
                                <a href="{{ route('mahasiswa.krses.destroy', $krs->id) }}">Delete</a>
                            <td>


                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <form action="{{ route('mahasiswa.krses.store') }}" method="post" class="mt-3">
                    @csrf
                    @method('post')
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="kode_matkul" class="col-form-label fw-bold">Tambah Matkul</label>
                        </div>
                        <div class="col-auto">
                            <select class="form-control" name="kode_matkul" id="kode_matkul">
                                @foreach ($matakuliahs as $matakuliah)
                                <option value="{{ $matakuliah->kode }}">
                                    {{ $matakuliah->nama }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
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
                            <th scope="col">Kode</th>
                            <th scope="col">Matakuliah</th>
                            <th scope="col">SKS</th>
                            <th scope="col">Nilai Akhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mahasiswa->khses as $khs)
                        <tr>
                            <th scope="row">{{ $loop->index+1 }}</th>
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
                    <div class="p-2 bd-highlight h2 text-primary">{{ $mahasiswa->nama }}</div>
                </div>
                <div class="d-flex flex-row bd-highlight mb-3 ">
                    <div class="p-2 bd-highlight fw-bold h2 ">NIM:</div>
                    <div class="p-2 bd-highlight h2 text-primary">{{ $mahasiswa->nim }}</div>
                </div>
                <div class="d-flex flex-row bd-highlight mb-3 ">
                    <div class="p-2 bd-highlight fw-bold h2 ">Prodi:</div>
                    <div class="p-2 bd-highlight h2 text-primary">{{ $mahasiswa->program_studi->nama_prod }}</div>
                </div>
                <div class="d-flex flex-row bd-highlight mb-3 ">
                    <div class="p-2 bd-highlight fw-bold h2 ">Alamat:</div>
                    <div class="p-2 bd-highlight h2 text-primary">{{ $mahasiswa->alamat }}</div>
                </div>
            </div>
        </div>
        <hr>
        <!-- Pass Section -->
        <div class="row justify-content-center">
            <div class="col-md-4 text-center">
                <form action="{{ route('mahasiswa.updatePassword') }}" method="post">
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
