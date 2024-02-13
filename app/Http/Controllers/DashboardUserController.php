<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    public function index(Request $request)
    {
        $jumlah_artikel = Artikel::count();
        $artikel = Artikel::paginate(3);

        if ($request->ajax()) {
            $view = view('landing.data.artikel', [
                'artikel' => $artikel,
            ])->render();
            return response()->json(['html' => $view]);
        }

        return view('landing.pages.index', [
            'artikel' => $artikel,
            'jumlah_artikel' => $jumlah_artikel,
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
