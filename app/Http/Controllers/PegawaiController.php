<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::all();
        return view('pegawais.index', compact('pegawais'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'jabatan' => 'required|string',
            'hp' => 'required|string',
        ]);

        Pegawai::create($request->all());

        return response()->json(['success' => 'Pegawai created successfully.']);
    }

    public function edit($id)
    {
        $pegawai = Pegawai::find($id);
        return response()->json($pegawai);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'jabatan' => 'required|string',
            'hp' => 'required|string',
        ]);

        $pegawai = Pegawai::find($id);
        $pegawai->update($request->all());

        return response()->json(['success' => 'Pegawai updated successfully.']);
    }

    public function destroy($id)
    {
        $pegawai = Pegawai::find($id);
        $pegawai->delete();

        return response()->json(['success' => 'Pegawai deleted successfully.']);
    }
}
