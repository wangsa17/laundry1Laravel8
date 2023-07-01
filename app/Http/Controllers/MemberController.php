<?php

namespace App\Http\Controllers;

use App\Models\member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    protected $judul = 'member';
    protected $menu = 'member';
    protected $submenu = '';
    protected $directory = 'admin.datauser.member';

    public function index()
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;
        $data['member'] = member::all();
        return view($this->directory . '.main', $data);
    }

    public function create()
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;
        $data['member'] = member::all();
        return view($this->directory . '.add', $data);
    }

    public function store(Request $request)
    {
        $nama = $request->nama;
        $username = $request->username;
        $email = $request->email;
        $password = $request->password;
        $alamat = $request->alamat;
        $jenis_kelamin = $request->jenis_kelamin;
        $tlp = $request->tlp;
        // dd($request);
        //pengecekan
        if (empty($nama)) {
            // return back()->withInput()->with('errors','<h1><b>Oops!!</b></h1> <br> Nama Lengkap Harus Diisi');
            return back()->withInput()->with('toast_error', 'Nama Lengkap Harus Diisi');
        }
        if (empty($username)) {
            return back()->withInput()->with('toast_error', 'Username Harus Diisi');
        }
        if (empty($password)) {
            return back()->withInput()->with('toast_error', 'Password Harus Diisi');
        }
        if (empty($alamat)) {
            return back()->withInput()->with('toast_error', 'Alamat Harus Diisi');
        }
        if (empty($jenis_kelamin)) {
            return back()->withInput()->with('toast_error', 'Jenis Kelamin Harus Diisi');
        }
        if (empty($tlp)) {
            return back()->withInput()->with('toast_error', 'No Telepon Harus Diisi');
        }

        //simpan
        $member = new member();
        $member->nama = $nama;
        $member->username = $username;
        $member->email = $email;
        $member->password = bcrypt($password);
        $member->alamat = $alamat;
        $member->jenis_kelamin = $jenis_kelamin;
        $member->tlp = $tlp;
        $member->save();

        if ($member) {
            return redirect()->route('member')->with('toast_success', 'Berhasil Menyimpan Data');
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
        $data['member'] = member::where('id_member', $id)->first();

        return view($this->directory . '.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $nama = $request->nama;
        $username = $request->username;
        $email = $request->email;
        $password = $request->password;
        $alamat = $request->alamat;
        $jenis_kelamin = $request->jenis_kelamin;
        $tlp = $request->tlp;
        // dd($request);
        //pengecekan
        if (empty($nama)) {
            // return back()->withInput()->with('errors','<h1><b>Oops!!</b></h1> <br> Nama Lengkap Harus Diisi');
            return back()->withInput()->with('toast_error', 'Nama Lengkap Harus Diisi');
        }
        if (empty($username)) {
            return back()->withInput()->with('toast_error', 'Nama Outlet Harus Diisi');
        }
        // if (empty($password)) {
        //     return back()->withInput()->with('toast_error', 'Nama Outlet Harus Diisi');
        // }
        if (empty($alamat)) {
            return back()->withInput()->with('toast_error', 'Nama Outlet Harus Diisi');
        }
        if (empty($jenis_kelamin)) {
            return back()->withInput()->with('toast_error', 'Nama Outlet Harus Diisi');
        }
        if (empty($tlp)) {
            return back()->withInput()->with('toast_error', 'Nama Outlet Harus Diisi');
        }


        //simpan
        $member = member::where('id_member', $id)->first();
        $member->nama = $nama;
        $member->username = $username;
        $member->email = $email;
        if (!empty($password)) {
            $member->password = Hash::make($password);
        }
        $member->alamat = $alamat;
        $member->jenis_kelamin = $jenis_kelamin;
        $member->tlp = $tlp;
        $member->save();

        if ($member) {
            return redirect()->route('member')->with('toast_success', 'Berhasil Merubah Data');
        } else {
            return back()->withInput()->with('toast_error', 'Gagal Merubah Data');
        }
    }

    public function destroy($id)
    {
        $member = member::where('id_member', $id)->first();
        if (!empty($member)) {
            $member->delete();
            return redirect()->route('member')->with('toast_success', 'Berhasil Menghapus Data');
        } else {
            return back()->withInput()->with('toast_error', 'Gagal Menghapus Data');
        }
    }
}
