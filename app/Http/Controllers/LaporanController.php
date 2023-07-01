<?php

namespace App\Http\Controllers;

use App\Models\paket;
use App\Models\transaksi;
use App\Models\transaksi_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    protected $judul = 'Laporan';
    protected $menu = 'laporan';
    protected $sub_menu = '';
    protected $direktori = 'admin.laporan';

    public function index(Request $request)
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;

        $data['paket'] = paket::all();
        $data['transaksi'] = transaksi::where('paket_id')->get();
        // $data['transaksiDetail'] = transaksi_detail::all();
        $data['transaksiDetail'] = transaksi_detail::where('paket_id')->get();
        $data['paketsum'] = transaksi_detail::select('paket_id')->sum('total_harga');

        // $data['paketsumm'] = transaksi_detail::select(DB::raw("SUM(total_harga) as count"))
        // ->orderBy("created_at")
        // ->groupBy(DB::raw("year(created_at)"))
        // ->get();
        // dd($data);
        // $data['paketsum'] = transaksi_detail::select('paket_id')->sum('total_harga');
        // $data['total'] = transaksi::selectRaw("SUM(td.total_harga) as jumlah")
        // ->join('transaksi_detail as td', 'td.transaksi_id', 'transaksi.id_transaksi')
        // ->join('paket as p', 'p.id_paket', 'td.paket_id')
        // ->where('id_transaksi', '1', '2')
        // ->first()->jumlah;

        return view($this->direktori . '.main', $data);
    }
}
