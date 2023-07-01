<?php

namespace App\Http\Controllers;

use App\Models\outlet;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    protected $judul = 'Outlet';
    protected $menu = 'outlet';
    protected $submenu = '';
    protected $directory = 'admin.datamaster.outlet';

    public function index()
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;
        $data['outlet'] = outlet::all();

        return view($this->directory . '.main', $data);
    }

    public function create()
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;
        $data['outlet'] = outlet::all();
        return view($this->directory . '.add', $data);
    }

    public function store(Request $request)
    {
        $nama = $request->nama;
        $alamat = $request->alamat;
        $tlp = $request->tlp;
        // dd($request);
        //pengecekan
        if (empty($nama)) {
            // return back()->withInput()->with('errors','<h1><b>Oops!!</b></h1> <br> Nama Lengkap Harus Diisi');
            return back()->withInput()->with('toast_error', 'Nama Lengkap Harus Diisi');
        }
        if (empty($alamat)) {
            return back()->withInput()->with('toast_error', 'Alamat Harus Diisi');
        }
        if (empty($tlp)) {
            return back()->withInput()->with('toast_error', 'No Telepon Harus Diisi');
        }

        //simpan
        $outlet = new outlet();
        $outlet->nama = $nama;
        $outlet->alamat = $alamat;
        $outlet->tlp = $tlp;
        $outlet->save();

        if ($outlet) {
            return redirect()->route('outlet')->with('toast_success', 'Berhasil Menyimpan Data');
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
        $data['outlet'] = outlet::where('id_outlet', $id)->first();

        return view($this->directory . '.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $nama = $request->nama;
        $alamat = $request->alamat;
        $tlp = $request->tlp;
        // dd($request);
        //pengecekan
        if (empty($nama)) {
            // return back()->withInput()->with('errors','<h1><b>Oops!!</b></h1> <br> Nama Lengkap Harus Diisi');
            return back()->withInput()->with('toast_error', 'Nama Lengkap Harus Diisi');
        }
        if (empty($alamat)) {
            return back()->withInput()->with('toast_error', 'Alamat Harus Diisi');
        }
        if (empty($tlp)) {
            return back()->withInput()->with('toast_error', 'No Telepon Harus Diisi');
        }


        //simpan
        $outlet = outlet::where('id_outlet', $id)->first();
        $outlet->nama = $nama;
        $outlet->alamat = $alamat;
        $outlet->tlp = $tlp;
        $outlet->save();

        if ($outlet) {
            return redirect()->route('outlet')->with('toast_success', 'Berhasil Merubah Data');
        } else {
            return back()->withInput()->with('toast_error', 'Gagal Merubah Data');
        }
    }

    public function destroy($id)
    {
        $outlet = outlet::where('id_outlet', $id)->first();
        if (!empty($outlet)) {
            $outlet->delete();
            return redirect()->route('outlet')->with('toast_success', 'Berhasil Menghapus Data');
        } else {
            return back()->withInput()->with('toast_error', 'Gagal Menghapus Data');
        }
    }
}
