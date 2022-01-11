<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $guarded = [];
    public function kelasMateri()
    {
        return $this->hasMany('App\KelasMateri');
    }
    public function kelasSiswa()
    {
        return $this->hasMany('App\KelasSiswa');
    }
    public function kelasAktifitas()
    {
        return $this->hasMany('App\KelasAktifitas');
    }
}
