<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KelasMateri extends Model
{
    protected $guarded = [];

    public function kelas()
    {
        return $this->belongsTo('App\Kelas');
    }
    public function materi()
    {
        return $this->belongsTo('App\Materi');
    }
}
