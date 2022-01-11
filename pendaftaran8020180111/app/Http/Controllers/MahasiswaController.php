<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function formDaftar(){
        $data['objek'] = new \App\Mahasiswa();
        $data['action'] = 'MahasiswaController@simpanDaftar';
        $data['method'] = 'POST';        
        return view("daftar_form", $data);
    }

    public function simpanDaftar(Request $request){
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'foto' => 'required|mimes:png,jpg,jpeg',
            'jurusan_id' => 'required'
        ]);
        $path = $request->file('foto')->store('public/foto-mahasiswa');
        $mahasiswa = new \App\Mahasiswa();
        $mahasiswa->nama = $request->nama;
        $mahasiswa->jenis_kelamin = $request->jenis_kelamin;
        $mahasiswa->tanggal_lahir = $request->tanggal_lahir;
        $mahasiswa->email = $request->email;
        $mahasiswa->password = bcrypt($request->password);
        $mahasiswa->asal_sekolah = $request->asal_sekolah;
        $mahasiswa->foto = $path;
        $mahasiswa->save();

        $registrasi = new \App\Registrasi();
        $registrasi->user_id = 0;
        $registrasi->mahasiswa_id = $mahasiswa->id;
        $registrasi->jurusan_id = $request->jurusan_id;
        $registrasi->status = 'baru';
        
        $registrasi->save();
        \Auth::guard('mahasiswa')->login($mahasiswa);
        return redirect('mahasiswa/beranda')->with('pesan', 'Registrasi Berhasil');
    }

    public function beranda(){
        if(\Auth::guard('mahasiswa')->check()){
            $data['objek'] = new \App\RegistrasiSyarat();
            $data['action'] = 'MahasiswaController@simpanSyarat';
            $data['method'] = 'POST';
            $data['registrasi'] = \App\Registrasi::whereMahasiswaId(\Auth::guard('mahasiswa')->user()->id)->first();     
            return view('mahasiswa_beranda',$data);
        }
        else{
            return redirect('form-login');
        }
    }

    public function formLogin(){
        if (\Auth::guard('mahasiswa')->check()){
            return redirect('mahasiswa/beranda');
        }

        $data['objek'] = new \App\Mahasiswa();
        $data['action'] = 'MahasiswaController@prosesLogin';
        $data['method'] = 'POST';        
        return view("login_form", $data);
    }
    public function prosesLogin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (\Auth::guard('mahasiswa')->attempt($credentials)){
            return redirect('mahasiswa/beranda');
        }
        else {
            return back()->with('pesan', 'Login Gagal');
        }
    }
    public function logout(){
        \Auth::guard('mahasiswa')->logout();
        return redirect('/');
    }

    public function simpanSyarat(Request $request){
        $request->validate([
            'nama' => 'required',
            'file' => 'required|mimes:jpg,jpeg,png'
        ]);

        $registrasi_id = \Auth::guard('mahasiswa')->user()->registrasi()->take(1)->first()->id;
        \App\RegistrasiSyarat::whereNama($request->nama)->where('registrasi_id', $registrasi_id)->delete();

        $file = $request->file->store('pulic/syarat-registrasi');
        $syarat = new \App\RegistrasiSyarat();
        $syarat->nama = $request->nama;
        $syarat->file = $file;
        $syarat->status = 'baru';
        $syarat->registrasi_id = $registrasi_id;
        $syarat->save();
        return back()->with('pesan', 'Data Berhasil Disimpan');
    }

    public function hapusSyarat($id){
        $syarat = \App\RegistrasiSyarat::findOrFail($id);
        \Storage::delete($syarat->file);
        $syarat->delete();
        return back()->with('pesan', 'Data Berhasil Dihapus');
    }

}
