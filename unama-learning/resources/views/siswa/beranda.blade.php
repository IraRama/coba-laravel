@extends('siswa.layout')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">Selamat Datang, {{ \Auth::user()->name }}</div>

    <div class="card-body">
        <center>
            {!! Form::open(['url' => url('siswa/kelas'), 'method' => 'POST']) !!}
            <div class="form-group">
                <label for="kode">Kode Kelas Online</label>
                {!! Form::text('kode', null, ['class' => 'form-control', 'autofocus']) !!}
            </div>
            {!! Form::submit('Gabung', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </center>
    </div>
</div>
@endsection
