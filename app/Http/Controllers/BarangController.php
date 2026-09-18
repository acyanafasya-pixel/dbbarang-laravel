<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $data = Barang::all();
        return view('barang.index', compact('data'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|unique:barangs',
            'nama_barang' => 'required',
            'stok' => 'required|numeric',
            'harga' => 'required|numeric'
        ]);
        
        Barang::create($request->all());
        return redirect('/barang')->with('sukses', 'Data Barang Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $barang = Barang::find($id);
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::find($id);
        $barang->update($request->all());
        return redirect('/barang')->with('sukses', 'Data Barang Berhasil Diubah');
    }

    public function destroy($id)
    {
        Barang::find($id)->delete();
        return redirect('/barang')->with('sukses', 'Data Barang Berhasil Dihapus');
    }
}