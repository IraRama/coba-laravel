<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\User as User;
use \App\Kelas as Model;
use \App\Materi as Materi;
use \App\KelasMateri as KelasMateri;
use \App\KelasSiswa as KelasSiswa;
use Illuminate\Support\Facades\Auth;
class GuruKelasController extends Controller
{
    public function index(){
        $data['model'] = Model::where('user_id', Auth::user()->id)->latest()->get();
        //dd($data['model']);
        return view('guru.kelas_index', $data);
    }

    public function create(){
        $data['model'] = new Model();
        $data['method'] = 'POST';
        $data['url'] = url('guru/kelas');
        $data['namaTombol'] = 'Simpan';
        return view('guru.kelas_form', $data);
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'nullable',
            'kode' => 'required|unique:kelas'
        ]);
        $request->merge(['user_id' => Auth::user()->id]);
        Model::create($request->all());
        flash('Data sudah disimpan')->success();
        return back();
    }

    public function edit($id){        
        $data['model'] = Model::findOrFail($id);        
        $data['method'] = 'PUT';
        $data['url'] = url('guru/kelas/'.$id);
        $data['namaTombol'] = 'Update';
        return view('guru.kelas_form', $data);
    }

    public function update(Request $request, $id){
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'nullable',
            'kode' => 'required|unique:kelas,kode,'.$id,
        ]);
        //$request->merge(['user_id' => Auth::user()->id]);
        Model::where('id',$id)->update($request->except('_method', '_token'));
        flash('Data sudah diupdate')->success();
        return back();
    }

    public function destroy($id){
        $model = Model::findOrFail($id);
        $model->delete();
        flash('Data berhasil dihapus')->error();
        return back();
    }

    public function show($id){
        $model = Model::findOrFail($id);
        $data['model'] = $model;
        return view('guru.kelas_detail', $data);
    }

    public function kelasMateriForm(Request $request){
         
        $data['model'] = new Model();
        $data['kelas_id'] = $request->id;
        $data['method'] = 'POST';
        $data['url'] = url('guru/kelas-materi/store');        
        $data['materi'] = Materi::where('user_id', Auth::user()->id)->get()->pluck('judul', 'id');
        $data['namaTombol'] = 'Simpan';
        return view('guru.kelas_materi', $data);
    }

    public function kelasMateriStore(Request $request){

        $kelasMateri = new KelasMateri(); 
        $kelasMateri->judul = $request->judul;
        $kelasMateri->user_id = Auth::user()->id;
        $kelasMateri->kelas_id = $request->kelas_id;
        $kelasMateri->materi_id = $request->materi_id;
        $kelasMateri->status = 'tampil';
        $kelasMateri->save();
        
        flash('Data sudah disimpan');
        return back(); 
    }

    public function kelasMateriDelete($id){
        $model = KelasMateri::findOrFail($id);
        $model->delete();
        flash('Data materi sudah dihapus');
        return back();
    }

    public function kelasMateriDetail($id){
        $model = KelasMateri::findOrFail($id);
        $data['model'] = $model;
        return view('guru.kelas_materi_detail', $data);
    }

    public function kelasPesertaForm(Request $request){
        $data['model'] = new KelasSiswa();
        $data['kelas_id'] = $request->id;
        $data['method'] = 'POST';
        $data['url'] = url('guru/kelas-peserta/store');
        $data['siswa'] = User::whereAkses('siswa')->get()->pluck('name', 'id');
        return view('guru.kelas_peserta', $data);
    }
    public function kelasPesertaStore(Request $request){
        $request->validate([
            'kelas_id' => 'required',
            'email' => 'required|email',
        ]);
                                    /* Cara 1         Cara 2 */
        $userPeserta = User::where('akses', 'siswa')->whereEmail($request->email)->first(); //Mengecek tabel user dengan kolom akses dengan nilai siswa, yang emailnya sama dengan yang diminta
        
        if ($userPeserta == null) {
            flash('Data tidak ditemukan')->error();
            return back();
        }
        $kelasSiswa = KelasSiswa::whereKelasId($request->kelas_id)->whereUserId($userPeserta->id)->first(); // mengecek dari tabel/model KelasSiswa dimana kelas id = kelasid yang direquest dan userid yang merequest
        if ($kelasSiswa != null) {
            flash('Peserta ini sudah tergabung di kelas yang sama')->error();
            return back();
        }
        KelasSiswa::create([
            'user_id' => $userPeserta->id,
            'kelas_id' => $request->kelas_id,
            'status' => 1,
            'deskripsi' => '0'
        ]);
        flash('Data sudah disimpan');
        return back();
    }
    public function kelasPesertaDelete($id){
        $kelasSiswa = KelasSiswa::findOrFail($id);
        $kelasSiswa->delete();
        flash('Data sudah dihapus')->error();
        return back();
    }
}
