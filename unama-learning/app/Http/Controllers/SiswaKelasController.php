<?php

namespace App\Http\Controllers;
use \App\Kelas as Kelas;
use \App\KelasSiswa as KelasSiswa;
use \App\KelasMateri as KelasMateri;
use \App\KelasAktifitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaKelasController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'kode' => 'required',
        ]);
        $kelas = Kelas::whereKode($request->kode)->first();        
        if ($kelas == null){
            flash('Kelas tidak tersedia')->error();
            return back();
        }

        $kelasSiswa = KelasSiswa::whereKelasId($kelas->id)->whereUserId(Auth::user()->id)->first();        
        if ($kelasSiswa != null) {
            flash('Proses gagal, Anda sudah bergabung di kelas ini')->error();
            return back();
        }

        KelasSiswa::create([
            'kelas_id' => $kelas->id,
            'user_id' => Auth::user()->id,
            'status' => 1,
            'deskripsi' => 'Gabung Sendiri',
        ]);
        flash('Proses berhasil, anda sudah tergabung di kelas '.$kelas->nama);
        return back();
    }

    public function index(){
        $kelasSiswa = KelasSiswa::whereUserId(Auth::user()->id)->whereStatus(1)->get();
        $data['model'] = $kelasSiswa;
        return view('siswa.kelas_index', $data);
    }

    public function show($id){
        $kelasSiswa = KelasSiswa::whereUserId(Auth::user()->id)->whereKelasId($id)->whereStatus(1)->firstOrFail();
        KelasAktifitas::create([
            'kelas_id' => $id,
            'user_id' => Auth::user()->id,
            'deskripsi' => 'Melihat daftar materi kelas '.$kelasSiswa->kelas->nama,
        ]);
        $kelasMateri = KelasMateri::whereKelasId($id)->get();

        $data['model'] = $kelasMateri;
        $data['kelasSiswa'] = $kelasSiswa;
        return view('siswa.kelas_materi', $data);
    }

    public function detail($id){
        $model = KelasMateri::whereMateriId($id)->first();
        KelasAktifitas::create([
            'kelas_id' => $model->id,
            'user_id' => Auth::user()->id,
            'deskripsi' => 'Melihat detail materi '.$model->materi->judul,
        ]);
        $data['model'] = $model;
        return view('siswa.kelas_materi_detail', $data);
    }
}
