<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\member;
use App\Models\outlet;
use App\Models\paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $judul = 'Home';
    protected $menu = 'home';
    protected $submenu = 'home';
    protected $directory = 'user.home';

    public function index()
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;

        $data['member'] = member::where('id_member', Auth::id());
        $data['outlet'] = outlet::paginate(6);
        $data['paket'] = paket::paginate(4);
        return view($this->directory . '.index', $data);
    }
    public function main()
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;

        $data['member'] = member::where('id_member', Auth::id());
        $data['outlet'] = outlet::paginate(6);
        $data['paket'] = paket::paginate(4);
        return view($this->directory . '.main', $data);
    }
    public function outlet()
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;

        $data['outlet'] = outlet::all();
        // $data['outlet'] = outlet::all();
        return view($this->directory . '.outlet', $data);
    }
    public function paket()
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;

        $data['outlet'] = outlet::all();
        $data['paket'] = paket::all();
        return view($this->directory . '.paket', $data);
    }
    public function pesan()
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;
        $data['paket'] = paket::all();

        return view($this->directory . '.pesan', $data);
    }
}
