<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;
use App\Status;
use App\Jabatan;
use App\Pendidikan;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $karyawan = Karyawan::all();
        $status = Status::all();
        $pendidikan = Pendidikan::all();
        $jabatan = Jabatan::all();
        return view('index', compact('karyawan', 'status', 'pendidikan', 'jabatan'));
    }
}
