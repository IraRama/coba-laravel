<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KelasAktifitas extends Model
{
    //
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function kelas()
    {
        return $this->belongsTo('App\kelas');
    }
}
