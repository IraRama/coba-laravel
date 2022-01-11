<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $guarded = [];

    public function getJudulAttribute($value){
        return $this->jenis. " :: ".$value;
    }
}
