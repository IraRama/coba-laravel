@extends('guru.layout')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">Daftar Kelas</div>

    <div class="card-body">
                
        {!! Form::model($model, ['url' => $url,'method' => $method]) !!}
        {!! Form::hidden('kelas_id', $kelas_id, []) !!}

        <div class="form-group">
            <label for="email">Masukan Email Peserta</label>
            {!! Form::email('email', null, ["class" => 'form-control']) !!}
            <span class="text-helper">{{ $errors->first('email') }}</span>
        </div>                

        <div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="{{ url('guru/kelas/'.$kelas_id) }}" class="btn btn-secondary">Kembali</a>
        </div>

        {!! Form::close() !!}
    </div>
</div>
@endsection
