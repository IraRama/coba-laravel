@extends('siswa.layout')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">Daftar Kelas Anda</div>

    <div class="card-body">        
        <div class="table-responsive">
            <table class="table tabel-stripped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>                        
                        <th>Tanggal Gabung</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($model as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kelas->nama }}</td>
                            <td>{{ $item->kelas->deskripsi }}</td>                            
                            <td>{{ $item->created_at }}</td>
                            <td>
                               <a href="{{ url('siswa/kelas/'.$item->kelas_id, []) }}" class="btn btn-primary">
                                    Lihat Materi ({{ $item->kelasMateri->count() }})
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">Data Tidak ada</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
