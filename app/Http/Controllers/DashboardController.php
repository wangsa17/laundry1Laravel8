<?php

namespace App\Http\Controllers;

use App\Models\member;
use App\Models\outlet;
use App\Models\paket;
use App\Models\transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $judul='Dashboard';
    protected $menu='dashboard';
    protected $submenu='dashboard';
    protected $direktori='admin.dashboard';

    public function index()
    {
        $data['judul']=$this->judul;
        $data['menu']=$this->menu;
        $data['submenu']=$this->submenu;

        $data['member'] = member::all();
        $data['outlet'] = outlet::all();
        $data['paket'] = paket::all();
        $data['transaksi'] = transaksi::all();
        return view($this->direktori.'.main', $data);
    }
}
