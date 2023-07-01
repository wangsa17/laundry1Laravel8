<?php

namespace App\Http\Controllers;

use App\Models\paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    protected $judul = 'Paket';
    protected $menu = 'paket';
    protected $submenu = '';
    protected $directory = 'admin.datamaster.paket';

    public function index()
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;
        $data['paket'] = paket::all();

        return view($this->directory . '.main', $data);
    }

    public function create()
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;
        $data['paket'] = paket::all();
        return view($this->directory . '.add', $data);
    }

    public function store(Request $request)
    {
        $nama_paket = $request->nama_paket;
        $harga = $request->harga;
        $deskripsi = $request->deskripsi;
        // dd($request);
        //pengecekan
        if (empty($nama_paket)) {
            // return back()->withInput()->with('errors','<h1><b>Oops!!</b></h1> <br> Nama_paket Lengkap Harus Diisi');
            return back()->withInput()->with('toast_error', 'Nama Paket Lengkap Harus Diisi');
        }
        if (empty($harga)) {
            return back()->withInput()->with('toast_error', 'Harga Harus Diisi');
        }
        if (empty($deskripsi)) {
            return back()->withInput()->with('toast_error', 'No Telepon Harus Diisi');
        }

        //simpan
        $paket = new paket();
        $paket->nama_paket = $nama_paket;
        $paket->harga = $harga;
        $paket->deskripsi = $deskripsi;
        $paket->save();

        if ($paket) {
            return redirect()->route('paket')->with('toast_success', 'Berhasil Menyimpan Data');
        } else {
            return back()->withInput()->with('toast_error', 'Gagal Menyimpan Data');
        }
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;
        $data['paket'] = paket::where('id_paket', $id)->first();

        return view($this->directory . '.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $nama_paket = $request->nama_paket;
        $harga = $request->harga;
        $deskripsi = $request->deskripsi;
        // dd($request);
        //pengecekan
        if (empty($nama_paket)) {
            // return back()->withInput()->with('errors','<h1><b>Oops!!</b></h1> <br> Nama_paket Lengkap Harus Diisi');
            return back()->withInput()->with('toast_error', 'Nama Paket Lengkap Harus Diisi');
        }
        if (empty($harga)) {
            return back()->withInput()->with('toast_error', 'Harga Harus Diisi');
        }
        if (empty($deskripsi)) {
            return back()->withInput()->with('toast_error', 'No Telepon Harus Diisi');
        }


        //simpan
        $paket = paket::where('id_paket', $id)->first();
        $paket->nama_paket = $nama_paket;
        $paket->harga = $harga;
        $paket->deskripsi = $deskripsi;
        $paket->save();

        if ($paket) {
            return redirect()->route('paket')->with('toast_success', 'Berhasil Merubah Data');
        } else {
            return back()->withInput()->with('toast_error', 'Gagal Merubah Data');
        }
    }

    public function destroy($id)
    {
        $paket = paket::where('id_paket', $id)->first();
        if (!empty($paket)) {
            $paket->delete();
            return redirect()->route('paket')->with('toast_success', 'Berhasil Menghapus Data');
        } else {
            return back()->withInput()->with('toast_error', 'Gagal Menghapus Data');
        }
    }
}
