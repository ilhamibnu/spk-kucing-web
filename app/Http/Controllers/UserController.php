<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index()
    {
        $user = User::where('role_id', '2')->get();
        return view('admin.pages.user', [
            'user' => $user
        ]);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $riwayat = Riwayat::where('user_id', $id)->get();
        if ($riwayat != null) {
            foreach ($riwayat as $r) {
                $r->delete();
            }
        }

        $user->delete();
        return redirect()->back()->with('destroy', 'Artikel berhasil dihapus');
    }
}
