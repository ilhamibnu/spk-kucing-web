<?php

namespace App\Http\Controllers;

use App\Models\DetailPenyakit;
use App\Models\Gejala;
use App\Models\NilaiKeyakinan;
use Illuminate\Http\Request;


class SimulasiDiagnosaController extends Controller
{
    public function index()
    {
        $gejala = Gejala::all();
        return view('admin.pages.simulasi-diagnosa', [
            'gejala' => $gejala,
        ]);
    }

    public function tingkat_keyakinan($keyakinan)
    {
        switch ($keyakinan) {
            case -0.8:
                return 'Hampir pasti tidak';
                break;
            case -1:
                return 'Pasti tidak';
                break;
            case -0.6:
                return 'Kemungkinan besar tidak';
                break;
            case -0.4:
                return 'Mungkin tidak';
                break;
            case 0.4:
                return 'Mungkin';
                break;
            case 0.6:
                return 'Sangat Mungkin';
                break;
            case 0.8:
                return 'Hampir pasti';
                break;
            case 1:
                return 'Pasti';
                break;
        }
    }

    public function kalkulasi_cf($data)
    {
        
    }

    public function diagnosa(Request $request)
    {
    }
}
