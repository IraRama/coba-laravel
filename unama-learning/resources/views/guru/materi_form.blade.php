@extends('guru.layout')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">Buat Materi Jenis {{ request()->jenis }}</div>

    <div class="card-body">
        {!! Form::model($model, ['url' => $url,'method' => $method, 'files' => true]) !!}
        <div class="form-group">
            {!! Form::hidden('jenis', request()->jenis, []) !!}
            <label for="judul">Judul</label>
            {!! Form::text('judul', null, ['class' => 'form-control', 'autofocus']) !!}
            <span class="text-helper">{{ $errors->first('judul') }}</span>
        </div>

        @if (request('jenis') == 'file')
        <div class="form-group">
            <label for="isi">Upload File Materi</label>
            {!! Form::file('isi', ['class' => 'form-control']) !!}
        </div>
        @endif

        @if (request('jenis')  == 'teks' || request('jenis') == 'video')
        <div class="form-group">
            <label for="isi">Isi</label>
            {!! Form::textarea('isi', null, ['class' => 'form-control', 'rows' => 3]) !!}
            <span class="text-helper">{{ $errors->first('isi') }}</span>
        </div>
        @endif

        <div>
            <button type="submit" class="btn btn-primary">{{ $namaTombol }}</button>
        </div>

        {!! Form::close() !!}
    </div>
</div>
@endsection
