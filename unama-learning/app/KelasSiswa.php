<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KelasSiswa extends Model
{
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function kelas()
    {
        return $this->belongsTo('App\Kelas');
    }
    public function kelasMateri()
    {
        return $this->hasMany('App\KelasMateri', 'kelas_id', 'kelas_id');
    }    
}
