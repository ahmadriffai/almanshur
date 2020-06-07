<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    //
    protected $guarded = [];

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }

    public function kamar(){
        return $this->belongsTo(Kamar::class);
    }

    public function pembayaran(){
        return $this->hasOne(Pembayaran::class);
    }

    public function users(){
        return $this->hasOne(User::class);
    }
    public function tagihan()
    {
        return $this->belongsToMany(Tagihan::class);
    }
}
