<?php

namespace App\Http\Controllers;

use App\Buku;
use Illuminate\Http\Request;

class UploadGambarController extends Controller
{
    public function index()
    {
        $datagambar = Buku::lastest()->get();
        return view('buku.index',compact('datagambar'));

    }
}
