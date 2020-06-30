<?php

namespace App\Http\Controllers;

use App\Karyawan;
use Illuminate\Http\Request;
use App\Jabatan;
use App\Pendidikan;
use App\telepon;
use App\Status;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawans = Karyawan::all();
        return view('employess.index', compact('karyawans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = Status::all();
        $pendidikan = Pendidikan::all();
        $jabatan = Jabatan::all();
        $telepon = telepon::all();

        return view('employess.add', compact('status', 'pendidikan', 'jabatan', 'telepon'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|min:3|max:50',
            'jenis_kelamin' => 'required|in:M,W',
            'jabatan_id' => 'required',
            'status_id' => 'required',
            'umur' => 'required',
            'pendidikan_id' => 'required',
            'tanggal_masuk' => 'required',
        ]);
        $karyawan = Karyawan::create($validateData);
        $telepon = new Telepon;
        $telepon->nomor_telepon = $request->input('nomor_telepon');
        $karyawan->telepon()->save($telepon);
        $request->session()->flash('pesan', "Data {$validateData['nama']} berhasil disimpan");
        return redirect()->route('karyawan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        return view('employess.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan)
    {
        $pendidikan = Pendidikan::all();
        $jabatan = Jabatan::all();
        $status = Status::all();
        $telepon = telepon::all();
        $date = strtotime($karyawan->tanggal_masuk);
        // $karyawan = Karyawan::all();
        return view('employess.edit', compact('karyawan', 'pendidikan', 'jabatan', 'status', 'telepon', 'date'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karyawan $karyawan)
    {

        $validateData = $request->validate([
            'nama' => 'min:3|max:50',
            'jenis_kelamin' => 'required|in:M,W',
            'jabatan_id' => 'required',
            'status_id' => 'required',
            'umur' => 'required',
            'pendidikan_id' => 'required',
            // 'tanggal_masuk' => 'required',
        ]);


        $karyawan->update($validateData);
        $telepon = $karyawan->telepon;
        $telepon->nomor_telepon = $request->input('nomor_telepon');
        $karyawan->telepon()->save($telepon);

        return redirect()->route('karyawan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();
        return redirect()->route('karyawan.index');
    }
}
