<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotifikasiController extends BaseController
{
    //

    protected $layout = 'layouts.app';

    public function notifikasi()
    {
        $this->layout->bayar = "la"; 
    }
}
