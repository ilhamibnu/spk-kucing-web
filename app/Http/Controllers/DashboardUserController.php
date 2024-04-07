<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\JenisKucing;
use App\Models\Penyakit;
use Illuminate\Http\Request;
use App\Models\PenyakitKulit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardUserController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->role_id == '1') {
                return redirect('/dashboard');
            }
        }

        // $jumlah_artikel = Artikel::count();
        $jumlah_artikel = DB::table('tb_artikel')
            ->select(DB::raw('COUNT(*) as jumlah_artikel'))
            ->first();

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

    public function artikeluser(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->role_id == '1') {
                return redirect('/dashboard');
            }
        }

        $jumlah_artikel = Artikel::count();

        $artikel = Artikel::paginate(3);

        if ($request->ajax()) {
            $view = view('landing.data.artikel', [
                'artikel' => $artikel,
            ])->render();
            return response()->json(['html' => $view]);
        }

        return view('landing.pages.artikel', [
            'artikel' => $artikel,
            'jumlah_artikel' => $jumlah_artikel,
        ]);
    }

    public function detailartikel($id)
    {
        if (Auth::check()) {
            if (Auth::user()->role_id == '1') {
                return redirect('/dashboard');
            }
        }

        $artikel = Artikel::find($id);
        return view('landing.pages.detail-artikel', [
            'artikel' => $artikel,
        ]);
    }

    ###########

    public function jeniskucinguser(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->role_id == '1') {
                return redirect('/dashboard');
            }
        }

        $jumlah_artikel = JenisKucing::count();
        $artikel = JenisKucing::paginate(3);

        if ($request->ajax()) {
            $view = view('landing.data.jenis-kucing', [
                'artikel' => $artikel,
            ])->render();
            return response()->json(['html' => $view]);
        }

        return view('landing.pages.jenis-kucing', [
            'artikel' => $artikel,
            'jumlah_artikel' => $jumlah_artikel,
        ]);
    }

    public function detailjeniskucinguser($id)
    {
        if (Auth::check()) {
            if (Auth::user()->role_id == '1') {
                return redirect('/dashboard');
            }
        }

        $artikel = JenisKucing::find($id);
        return view('landing.pages.detail-jenis-kucing', [
            'artikel' => $artikel,
        ]);
    }

    ###########

    public function penyakitkulituser(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->role_id == '1') {
                return redirect('/dashboard');
            }
        }

        $jumlah_artikel = PenyakitKulit::count();
        $artikel = PenyakitKulit::paginate(3);

        if ($request->ajax()) {
            $view = view('landing.data.penyakit-kulit', [
                'artikel' => $artikel,
            ])->render();
            return response()->json(['html' => $view]);
        }

        return view('landing.pages.penyakit-kulit', [
            'artikel' => $artikel,
            'jumlah_artikel' => $jumlah_artikel,
        ]);
    }

    public function detailpenyakitkulituser($id)
    {
        if (Auth::check()) {
            if (Auth::user()->role_id == '1') {
                return redirect('/dashboard');
            }
        }

        $artikel = PenyakitKulit::find($id);
        return view('landing.pages.detail-penyakit-kulit', [
            'artikel' => $artikel,
        ]);
    }

    ###########
}
