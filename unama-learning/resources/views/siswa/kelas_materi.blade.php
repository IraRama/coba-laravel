@extends('siswa.layout')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">Daftar Materi</div>

    <div class="card-body">  
            <h2>Nama Kelas : {{ $kelasSiswa->kelas->nama }}</h2>
            <table class="table tabel-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis</th>
                        <th>Isi</th>
                        <th>Tanggal Pemberian Tugas</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @forelse ($model as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->materi->jenis }}</td>
                            <td>
                                <a href="{{ url('siswa/kelas/materi/detail/'.$item->materi_id) }}">Lihat Materi : {{ $item->materi->judul }}</a>

                                {{-- @if ($item->jenis == "file")
                                    <a target="blank" href="{{ \Storage::url($item->materi->isi) }}">Lihat File : {{ $item->materi->judul }}</a>
                                @else
                                    {!! $item->materi->judul !!}
                                    <div>{!! $item->materi->isi !!}</div>
                                @endif --}}
                            </td>                            
                            <td>{{ $item->materi->created_at }}</td>                            
                        </tr>
                     @empty
                        <tr>
                            <td colspan="4">Data Tidak ada</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>        
    </div>
</div>
@endsection
