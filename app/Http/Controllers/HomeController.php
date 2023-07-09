<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\products;
use App\Models\dropshippers;
use App\Models\cabangs;
use App\Models\roles;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(User $jumlahKaryawan, products $jumlahProduct, dropshippers $jumlahDropshipper, roles $jumlahRole, cabangs $jumlahCabang)
    {
        $jumlahKaryawan = DB::table('users')
            ->select(DB::raw("COUNT(id)"))
            ->count();

        $jumlahProduct = DB::table('products')
            ->select(DB::raw("COUNT(id)"))
            ->count();
        
        $jumlahDropshipper = DB::table('dropshippers')
            ->select(DB::raw("COUNT(id)"))
            ->count();

        $jumlahRole = DB::table('roles')
            ->select(DB::raw("COUNT(id)"))
            ->count();

        $jumlahCabang = DB::table('cabangs')
            ->select(DB::raw("COUNT(id)"))
            ->count();

        return view('dashboard', [
            'jumlahKaryawan' => $jumlahKaryawan, 
            'jumlahProduct' => $jumlahProduct,
            'jumlahDropshipper' => $jumlahDropshipper,
            'jumlahRole' => $jumlahRole,
            'jumlahCabang' => $jumlahCabang,
        ]);

    }
}
