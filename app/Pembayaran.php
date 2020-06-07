<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    //
    protected $table = 'santri_tagihan';
    protected $guarded = [];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }
    public function tagihan(){
        return $this->belongsTo(Tagihan::class);
    }
}
