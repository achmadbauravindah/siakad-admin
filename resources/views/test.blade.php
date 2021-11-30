<h1>get status matakuliah</h1>
@foreach ($status_matkuls as $status_matkul)
<br>
{{ $status_matkul->matakuliahs()->where('kode', 'tif123')->first()->nama }}
@endforeach

<h1>get matakuliah</h1>
@foreach ($matakuliahs as $matakuliah)
<br>
{{ $matakuliah->status_matkuls->nama }}
@endforeach

<h1>get mahasiswa </h1>
@foreach ($mahasiswas as $mahasiswa)
<br>
{{ $mahasiswa->program_studi->jurusan->fakultas->nama_fak }}
@endforeach
