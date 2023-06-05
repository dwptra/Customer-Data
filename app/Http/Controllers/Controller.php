<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Pelanggan;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function dashboard() {
        if (!Auth::user()) {
            return redirect()->back()->with('fail', 'Login terlebih dahulu!');
        }

        $countUser = User::count();
        $countPelanggan = Pelanggan::count();
        return view('pages.dashboard', [
            'countUser' => $countUser,
            'countPelanggan' => $countPelanggan
        ]);
    }
}
