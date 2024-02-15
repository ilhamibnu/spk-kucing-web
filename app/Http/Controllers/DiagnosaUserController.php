<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiagnosaUserController extends Controller
{
    public function index()
    {
        $gejala = Gejala::all();
        return view('landing.pages.diagnosa', [
            'gejala' => $gejala,
        ]);
    }

    public function tingkat_keyakinan($keyakinan)
    {
        switch ($keyakinan) {
            case 0:
                return 'Tidak Tahu';
                break;
            case 0.2:
                return 'Tidak Yakin';
                break;
            case 0.4:
                return 'Ya, Sedikit Yakin';
                break;
            case 0.6:
                return 'Ya, Cukup Yakin';
                break;
            case 0.8:
                return 'Ya, Yakin';
                break;
            case 1:
                return 'Ya, Sangat Yakin';
                break;
        }
    }

    public function kalkulasi_cf($data)
    {
        $data_penyakit = [];
        $gejala_terpilih = [];
        foreach ($data['diagnosa'] as $input) {
            if (!empty($input)) {
                $opts = explode('+', $input);
                $gejala = Gejala::with('penyakit')->find($opts[0]);

                foreach ($gejala->penyakit as $penyakit) {
                    if (empty($data_penyakit[$penyakit->id])) {
                        $data_penyakit[$penyakit->id] = [$penyakit, [$gejala, $opts[1], $penyakit->pivot->value_cf]];
                    } else {
                        array_push($data_penyakit[$penyakit->id], [$gejala, $opts[1], $penyakit->pivot->value_cf]);
                    }

                    if (empty($gejala_terpilih[$gejala->id])) {
                        $gejala_terpilih[$gejala->id] = [
                            'nama' => $gejala->nama,
                            'kode' => $gejala->kode,
                            'cf_user' => $opts[1],
                            'keyakinan' => $this->tingkat_keyakinan($opts[1])
                        ];
                    }
                }
            }
        }

        $hasil_diagnosa = [];
        $cf_max = null;
        foreach ($data_penyakit as $final) {
            if (count($final) < 3) {
                continue;
            }

            $cf1 = null;
            $cf2 = null;
            $cf_combine = 0;
            $hasil_cf = null;
            foreach ($final as $key => $value) {
                if ($key == 0) {
                    continue;
                }

                if ($key == 1) {
                    $cf1 = $final[$key][2] * $final[$key][1];
                } else {
                    if ($cf_combine != 0) {
                        $cf1 = $cf_combine;
                        $cf2 = $final[$key][2] * $final[$key][1];

                        if ($cf1 < 0 || $cf2 < 0) {
                            $cf_combine = ($cf1 + $cf2) / (1 - min($cf1, $cf2));
                        } else {
                            $cf_combine = $cf1 + ($cf2 * (1 - $cf1));
                        }

                        $hasil_cf = $cf_combine;
                    } else {
                        $cf2 = $final[$key][2] * $final[$key][1];

                        if ($cf1 < 0 || $cf2 < 0) {
                            $cf_combine = ($cf1 + $cf2) / (1 - min($cf1, $cf2));
                        } else {
                            $cf_combine = $cf1 + ($cf2 * (1 - $cf1));
                        }

                        $hasil_cf = $cf_combine;
                    }
                }

                if (count($final) - 1 == $key) {
                    if ($cf_max == null) {
                        $cf_max = [$hasil_cf, "{$final[0]->nama} ({$final[0]->kode})", $final[0]->id];
                    } else {
                        $cf_max = ($hasil_cf > $cf_max[0])
                            ? [$hasil_cf, "{$final[0]->nama} ({$final[0]->kode})", $final[0]->id]
                            : $cf_max;
                    }

                    $hasil_diagnosa[$final[0]->id]['hasil_cf'] = $hasil_cf;

                    $cf1 = null;
                    $cf2 = null;
                    $cf_combine = 0;
                    $hasil_cf = null;
                }



                if (empty($hasil_diagnosa[$final[0]->id])) {
                    $hasil_diagnosa[$final[0]->id] = [
                        'nama_penyakit' => $final[0]->nama,
                        'kode_penyakit' => $final[0]->kode,
                        'gejala' => [
                            [
                                'nama' => $final[$key][0]->nama,
                                'kode' => $final[$key][0]->kode,
                                'cf_user' => $final[$key][1],
                                'cf_role' => $final[$key][2],
                                'hasil_perkalian' => $final[$key][2] * $final[$key][1]
                            ]
                        ]
                    ];
                } else {
                    array_push($hasil_diagnosa[$final[0]->id]['gejala'], [
                        'nama' => $final[$key][0]->nama,
                        'kode' => $final[$key][0]->kode,
                        'cf_user' => $final[$key][1],
                        'cf_role' => $final[$key][2],
                        'hasil_perkalian' => $final[$key][2] * $final[$key][1]
                    ]);
                }
            }
        }

        return [
            'hasil_diagnosa' => $hasil_diagnosa,
            'gejala_terpilih' => $gejala_terpilih,
            'cf_max' => $cf_max
        ];
    }


    public function diagnosa(Request $request)
    {
        $name = $request->nama;

        $data = $request->all();

        $result = $this->kalkulasi_cf($data);

        if ($result['cf_max'] == null) {
            return redirect('/diagnosa')->with('error', 'Tidak ada hasil diagnosa');
        }

        $riwayat = Riwayat::create([
            'nama' => $name,
            'hasil_diagnosa' => serialize($result['hasil_diagnosa']),
            'cf_max' => serialize($result['cf_max']),
            'gejala_terpilih' => serialize($result['gejala_terpilih']),
            'user_id' => Auth::user()->id,
            'penyakit_id' => $result['cf_max'][2],
        ]);

        return redirect('/riwayat-user/detail/' . $riwayat->id);
    }
}
