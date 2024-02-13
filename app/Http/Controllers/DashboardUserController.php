<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    public function index()
    {
        $artikel = Artikel::paginate(3);
        return view('landing.pages.index', [
            'artikel' => $artikel,
        ]);
    }

    public function detailartikel($id)
    {
        $artikel = Artikel::find($id);
        return view('landing.pages.detail-artikel', [
            'artikel' => $artikel,
        ]);
    }
}
