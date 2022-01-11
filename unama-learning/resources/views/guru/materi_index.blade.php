@extends('guru.layout')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">Daftar Materi</div>

    <div class="card-body">
        <a href="{{ url('guru/materi/create?jenis=video') }}" class="btn btn-primary">Buat Materi Link video</a>
        <a href="{{ url('guru/materi/create?jenis=teks') }}" class="btn btn-primary m-2">Buat Materi Teks</a>
        <a href="{{ url('guru/materi/create?jenis=file') }}" class="btn btn-primary">Buat Materi File</a>
        <div class="table-responsive">
            <table class="table tabel-stripped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis</th>
                        <th>Isi</th>
                        <th>Tanggal Buat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($model as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->jenis }}</td>
                            <td>
                                @if ($item->jenis == "file")
                                    <a href="{{ \Storage::url($item->isi) }}">Lihat File : {{ $item->judul }}</a>
                                @else
                                    {!! $item->judul !!}
                                    <div>{!! $item->isi !!}</div>
                                @endif                                
                            </td>                            
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <a href="{{ url('guru/materi/'.$item->id.'/edit')}}" class="btn btn-info btn-sm">Edit</a>
                                {!! Form::open(['url' => 'guru/materi/'.$item->id,'method' => 'DELETE']) !!}
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                {!! Form::close() !!}
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
