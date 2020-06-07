<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    //
    public $guarded = [];

    public function santri()
    {
        return $this->belongsToMany(Santri::class);
    }
    public function pembayaran(){
        return $this->hasOne(Pembayaran::class);
    }
}
