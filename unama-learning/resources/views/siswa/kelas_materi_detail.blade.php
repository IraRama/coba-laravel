@extends('siswa.layout')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">Detail Materi</div>

    <div class="card-body">
        Judul : {{ strtoupper($model->judul) }}
        <br/>
        Nama Materi : 
        @if ($model->materi->jenis == "file")
            <a href="{{ \Storage::url($model->materi->isi) }}">{{ strtoupper($model->materi->judul) }}</a>
        @else            
            <div>{!! $model->materi->isi !!}</div>
        @endif
        <div>
        <a href="{{ url('siswa/kelas/'.$model->kelas_id, []) }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>
@endsection
