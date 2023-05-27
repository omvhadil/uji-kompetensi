<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{
    public function index()
    {
        $datas = DB::table('tabel_gaji')->get();
        return view('home', ['datas' => $datas]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_karyawan' => 'required',
            'jabatan' => 'required',
            'no_tlfn' => 'required',
        ]);

        $jabatan = $request->jabatan;
        if ($jabatan == 'Kepala Lembaga') {
            $data['gaji'] = 2500000;
            $data['tunjangan'] = 1500000;
            $data['total_gaji'] = $data['gaji'] + $data['tunjangan'];
        } elseif ($jabatan == 'Kepala Bidang') {
            $data['gaji'] = 2000000;
            $data['tunjangan'] = 1000000;
            $data['total_gaji'] = $data['gaji'] + $data['tunjangan'];
        } else  {
            $data['gaji'] = 1500000;
            $data['tunjangan'] = 500000;
            $data['total_gaji'] = $data['gaji'] + $data['tunjangan'];
        }

        DB::table('tabel_gaji')->insert($data);
        return redirect('/');
    }

    public function destroy($id)
    {
        DB::table('tabel_gaji')->where('id_gaji', $id)->delete();
        return redirect('/');
    }

    public function show($id)
    {
        $data = DB::table('tabel_gaji')->where('id_gaji', $id)->first();
        return view('edit', ['data' => $data]);
    }

    public function update($id)
    {
        $data = request()->validate([
            'nama_karyawan' => 'required',
            'jabatan' => 'required',
            'no_tlfn' => 'required',
        ]);

        $jabatan = request()->jabatan;
        if ($jabatan == 'Kepala Lembaga') {
            $data['gaji'] = 2500000;
            $data['tunjangan'] = 1500000;
            $data['total_gaji'] = $data['gaji'] + $data['tunjangan'];
        } elseif ($jabatan == 'Kepala Bidang') {
            $data['gaji'] = 2000000;
            $data['tunjangan'] = 1000000;
            $data['total_gaji'] = $data['gaji'] + $data['tunjangan'];
        } else  {
            $data['gaji'] = 1500000;
            $data['tunjangan'] = 500000;
            $data['total_gaji'] = $data['gaji'] + $data['tunjangan'];
        }

        DB::table('tabel_gaji')->where('id_gaji', $id)->update($data);
        return redirect('/');
    }
}