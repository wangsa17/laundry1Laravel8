<?php

namespace App\Http\Controllers;

use App\Models\outlet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $judul = 'kasir';
    protected $menu = 'kasir';
    protected $submenu = '';
    protected $directory = 'admin.datauser.kasir';

    public function index()
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;
        $data['user'] = User::where('role', 'Kasir')->get();

        return view($this->directory . '.main', $data);
    }

    public function create()
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;
        $data['user'] = User::where('role', 'Kasir')->get();
        $data['outlet'] = outlet::all();
        return view($this->directory . '.add', $data);
    }

    public function store(Request $request)
    {
        $nama = $request->nama;
        $username = $request->username;
        $email = $request->email;
        $password = $request->password;
        $outlet = $request->outlet;
        // dd($request);
        //pengecekan
        if (empty($nama)) {
            // return back()->withInput()->with('errors','<h1><b>Oops!!</b></h1> <br> Nama Lengkap Harus Diisi');
            return back()->withInput()->with('toast_error', 'Nama Lengkap Harus Diisi');
        }
        if (empty($username)) {
            return back()->withInput()->with('toast_error', 'Nama Outlet Harus Diisi');
        }
        if (empty($email)) {
            return back()->withInput()->with('toast_error', 'Nama Outlet Harus Diisi');
        }
        if (empty($password)) {
            return back()->withInput()->with('toast_error', 'Nama Outlet Harus Diisi');
        }
        if (empty($outlet)) {
            return back()->withInput()->with('toast_error', 'Nama Outlet Harus Diisi');
        }
        $cek_username = User::where('username', $username)->first();
        if (!empty($cek_username)) {
            return back()->withInput()->with('toast_error', 'Username Sudah Terdaftar');
        }
        $cek_email = User::where('email', $email)->first();
        if (!empty($cek_email)) {
            return back()->withInput()->with('toast_error', 'Email Sudah Terdaftar');
        }

        //simpan
        $user = new User();
        $user->nama = $nama;
        $user->username = $username;
        $user->username = $username;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->role = 'Kasir';
        $user->outlet_id = $outlet;
        $user->save();

        if ($user) {
            return redirect()->route('user')->with('toast_success', 'Berhasil Menyimpan Data');
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
        $data['user'] = User::where('id_user', $id)->first();

        return view($this->directory . '.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $nama = $request->nama;
        $username = $request->username;
        $email = $request->email;
        $password = $request->password;
        // dd($request);
        //pengecekan
        if (empty($nama)) {
            // return back()->withInput()->with('errors','<h1><b>Oops!!</b></h1> <br> Nama Lengkap Harus Diisi');
            return back()->withInput()->with('toast_error', 'Nama Lengkap Harus Diisi');
        }
        if (empty($username)) {
            return back()->withInput()->with('toast_error', 'Nama Outlet Harus Diisi');
        }
        if (empty($email)) {
            return back()->withInput()->with('toast_error', 'Nama Outlet Harus Diisi');
        }
        // $cek_username = User::where('username', $username)->first();
        // if (!empty($cek_username)) {
        //     return back()->withInput()->with('toast_error', 'Username Sudah Terdaftar');
        // }
        // $cek_email = User::where('email', $email)->first();
        // if (!empty($cek_email)) {
        //     return back()->withInput()->with('toast_error', 'Email Sudah Terdaftar');
        // }

        //simpan
        $user = User::where('id_user', $id)->first();
        $user->nama = $nama;
        $user->username = $username;
        $user->email = $email;
        if (!empty($password)) {
            $user->password = Hash::make($password);
        }
        $user->role = 'Kasir';
        $user->save();

        if ($user) {
            return redirect()->route('user')->with('toast_success', 'Berhasil Merubah Data');
        } else {
            return back()->withInput()->with('toast_error', 'Gagal Merubah Data');
        }
    }

    public function destroy($id)
    {
        $user = User::where('id_user', $id)->first();
        if (!empty($user)) {
            $user->delete();
            return redirect()->route('user')->with('toast_success', 'Berhasil Menghapus Data');
        } else {
            return back()->withInput()->with('toast_error', 'Gagal Menghapus Data');
        }
    }
}
