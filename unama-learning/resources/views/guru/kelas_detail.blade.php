@extends('guru.layout')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">Daftar Kelas</div>

    <div class="card-body">
        <h2>Info Kelas</h2>        
        <div class="table-responsive">
            <table class="table table-striped table-sm table-bordered">
                <tbody>
                    <tr>
                        <td>Nama</td>
                        <td>{{ $model->nama }}</td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td> {{ $model->deskripsi }}</td>
                    </tr>
                    <tr>
                        <td>Kode Kelas</td>
                        <td>{{ $model->kode }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <a href="{{ url('guru/kelas-materi/form?id='.$model->id, []) }}" class="btn btn-primary ">Tambah Materi</a>
        <a href="{{ url('guru/kelas-peserta/form?id='.$model->id, []) }}" class="btn btn-secondary">Tambah Peserta</a>
        <h2 class="mt-2">Materi Belajar </h2>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    
                    <th>Tanggal Buat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($model->kelasMateri as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{!! $item->judul.'<br/>'.$item->materi->judul !!}</td>
                        <td>{{ $item->materi->created_at }}</td>
                        <td>
                            <a href="{{ url('guru/kelas-materi/detail', $item->id) }}" class="btn btn-info">Lihat</a>
                            <a href="{{ url('guru/kelas-materi/delete', $item->id) }}" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?')">Hapus</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Belum Ada Materi</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <h2 class="mt-2">Daftar Peserta Kelas</h2>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Tanggal Daftar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($model->kelasSiswa as $itemSiswa)
                    <tr>
                        <td> {{ $loop->iteration}} </td>
                        <td> {{ $itemSiswa->user->name }} </td>
                        <td> {{ $itemSiswa->user->email }} </td>
                        <td> {{ $itemSiswa->user->created_at }} </td>
                        <td><a href="{{ url('guru/kelas-peserta/delete', $itemSiswa->id) }}" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin')">Hapus</a></td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Data tidak ada</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <h2 class="mt-2">Daftar Peserta Kelas</h2>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Siswa</th>
                    <th>Deskripsi</th>
                    <th>Tanggal Daftar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($model->kelasAktifitas as $itemAktifitas)
                    <tr>
                        <td> {{ $loop->iteration}} </td>
                        <td> {{ $itemAktifitas->user->name }} </td>
                        <td> {{ $itemAktifitas->deskripsi }} </td>
                        <td> {{ $itemAktifitas->created_at->format('d-m-Y H:i') }} </td>
                        <td><a href="{{ url('guru/kelas-peserta/delete', $itemSiswa->id) }}" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin')">Hapus</a></td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Data tidak ada</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
