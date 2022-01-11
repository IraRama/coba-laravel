@extends('guru.layout')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">Daftar Kelas</div>

    <div class="card-body">
        <a href="{{ url('guru/kelas/create', []) }}" class="btn btn-primary">Buat Kelas</a>
        <div class="table-responsive">
            <table class="table tabel-stripped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Kode</th>
                        <th>Tanggal Buat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($model as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>{{ $item->kode }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                
                                {!! Form::open(['url' => 'guru/kelas/'.$item->id,'method' => 'DELETE', 'class' => 'form-inline']) !!}
                                <a href="{{ url('guru/kelas/'.$item->id)}}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ url('guru/kelas/'.$item->id.'/edit')}}" class="btn btn-info btn-sm ml-3 mr-3">Edit</a>
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin')">Hapus</button>
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
