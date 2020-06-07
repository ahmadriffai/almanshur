<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $guarded = [];

    public function santri(){
        return $this->hasOne(Santri::class);
    }
}
