<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NilaiKeyakinanController extends Controller
{
    public function index()
    {
        return view('admin.pages.nilai-keyakinan');
    }
}
