<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\outlet;
use App\Models\paket;
use App\Models\transaksi;
use App\Models\transaksi_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesanController extends Controller
{
    protected $judul = 'pesan';
    protected $menu = 'pesan';
    protected $submenu = 'pesan';
    protected $directory = 'user.pesan';

    public function index($id)
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;

        $data['outlet'] = outlet::all();
        $data['paket'] = paket::paginate(4);
        return view($this->directory . '.main', $data);
    }

    public function proses(Request $request)
    {
        // dd($request);
        $paket_id=$request->paket;
        $outlet_id=$request->outlet;
        $tgl=$request->tgl;
        $qty=$request->qty;

        $transaksi = transaksi::orderBy('id_transaksi', 'DESC')->first();
        if ($transaksi) {
            $kode_transaksi = 'TR-000' . ((int)substr($transaksi->kode_transaksi, 6) + 1);
        } else {
            $kode_transaksi = 'TR-0001';
        }

        //simpan
        $pesan = new transaksi();
        $pesan->kode_transaksi = $kode_transaksi;
        $pesan->kode_invoice = '-';

        $pesan->member_id = Auth::user()->id_member;
        $pesan->outlet_id = $outlet_id;
        $pesan->paket_id = $paket_id;
        $pesan->tgl = date('Y-m-d', strtotime($tgl));
        $pesan->tgl_selesai = null;
        $pesan->tgl_bayar = null;
        $pesan->biaya_tambahan = null;
        $pesan->diskon = null;
        $pesan->pajak = null;
        $pesan->status_transaksi = 'Baru';
        $pesan->status_pembayaran = 'Belum Dibayar';
        $pesan->user_id = 1;
        $pesan->save();

        if ($pesan) {
            $pesan = transaksi::where('id_transaksi', $pesan->id_transaksi)->first();
            $pesan->kode_invoice = date('dmY') . '' . $pesan->id_transaksi;
            $pesan->save();

            $pesan_detail = new transaksi_detail();
            $pesan_detail->transaksi_id = $pesan->id_transaksi;
            $pesan_detail->paket_id = $paket_id;
            $pesan_detail->qty = $qty;
            $pesan_detail->save();
        }

        if ($pesan) {
            return redirect()->route('home')->with('toast_success', 'Berhasil Menyimpan Data');
        } else {
            return back()->withInput()->with('toast_error', 'Gagal Menyimpan Data');
        }
    }
    public function history(Request $request)
    {

        if (Auth::check()) {
            $data['judul'] = $this->judul;
            $data['menu'] = $this->menu;
            $data['submenu'] = $this->submenu;

            // $data['kategori_produk'] = KategoriProduk::with('produk')->get();
            // $data['produk'] = Produk::with('kategori_produk')->get();
            // $data['keranjang'] = Keranjang::all();
            // $data['produk'] = Produk::all();
            $data['transaksi'] = Transaksi::with('member')
                                            ->where('member_id', Auth::id())
                                            ->get();
            }
        return view($this->directory . '.history', $data);
    }
    public function detailhistory($id)
    {
        if (Auth::check()) {
            $data['judul'] = $this->judul;
            $data['menu'] = $this->menu;
            $data['submenu'] = $this->submenu;

            $data['transaksi'] = Transaksi::with([
                'user',
                'member',
                'transaksiDetail' => function ($td) {
                    $td->with(['paket']);
                }
            ])
                ->where('id_transaksi', $id)
                ->first();
            // $data['transaksi'] = Transaksi::with('member')
            //                                 ->where('member_id', Auth::id())
            //                                 ->get();
            }
        return view($this->directory . '.detailhistory', $data);
    }
    public function bayarUser($id)
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;

        $data['outlet'] = outlet::all();
        $data['paket'] = paket::paginate(4);
        $data['transaksi'] = Transaksi::with([
            'user',
            'member',
            'transaksiDetail' => function ($td) {
                $td->with(['paket']);
            }
        ])
            ->where('id_transaksi', $id)
            ->first();
        return view($this->directory . '.bayar', $data);
    }
    public function bayarstoreuser(Request $request)
    {
        // dd($request);
        $id = $request->id_transaksi;
        $user_id = Auth::id();
        $total_harga = $request->total_harga;
        $total_bayar = $request->total_bayar;

        if (empty($total_bayar)) {
            return back()->withInput()->with('toast_error', 'Jumlah Pembayaran Harus Diisi');
        }

        //simpan
        $transaksi = transaksi::where('id_transaksi', $id)->first();
        $transaksi->tgl_bayar = date('Y-m-d');
        $transaksi->status_transaksi = 'Diambil';
        $transaksi->status_pembayaran = 'Dibayar';
        $transaksi->save();

        if ($transaksi) {
            $transaksi_detail = transaksi_detail::where('transaksi_id', $id)->first();
            $transaksi_detail->total_harga = $total_harga;
            $transaksi_detail->total_bayar = $total_bayar;
            $transaksi_detail->save();
        }

        if ($transaksi) {
            return redirect()->route('history')->with('toast_success', 'Berhasil Menyimpan Data');
        } else {
            return back()->withInput()->with('toast_error', 'Gagal Menyimpan Data');
        }
    }
}
