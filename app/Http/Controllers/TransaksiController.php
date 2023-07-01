<?php

namespace App\Http\Controllers;

use App\Models\member;
use App\Models\outlet;
use App\Models\paket;
use App\Models\transaksi;
use App\Models\transaksi_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    protected $judul = 'Transaksi';
    protected $menu = 'transaksi';
    protected $submenu = '';
    protected $directory = 'admin.transaksi';

    public function index()
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;
        $data['transaksi'] = transaksi::where('status_transaksi', 'Baru')->get();

        return view($this->directory . '.main', $data);
    }
    public function mainproses()
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;
        $data['transaksi'] = transaksi::where('status_transaksi', 'Proses')->get();

        return view($this->directory . '.proses', $data);
    }
    public function maindiambil()
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;
        $data['transaksi'] = transaksi::where('status_transaksi', 'Diambil')->get();

        return view($this->directory . '.diambil', $data);
    }
    public function mainselesai()
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;
        $data['transaksi'] = transaksi::where('status_transaksi', 'Selesai')->get();

        return view($this->directory . '.selesai', $data);
    }

    //CRUD
    public function create()
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;
        $data['transaksi'] = transaksi::all();
        $data['member'] = member::all();
        $data['outlet'] = outlet::all();
        $data['paket'] = paket::all();
        return view($this->directory . '.add', $data);
    }

    public function store(Request $request)
    {
        $member = $request->member;
        $outlet = $request->outlet;
        $paket = $request->paket;
        $berat = $request->berat;
        $biaya_tambahan = $request->biaya_tambahan;
        $diskon = $request->diskon;
        $pajak = $request->pajak;
        $tgl = $request->tgl;
        $user_id = Auth::id();
        // dd($request);
        //pengecekan
        if (empty($member)) {
            // return back()->withInput()->with('errors','<h1><b>Oops!!</b></h1> <br> Nama_transaksi Lengkap Harus Diisi');
            return back()->withInput()->with('toast_error', 'Nama Member Harus Diisi');
        }
        if (empty($outlet)) {
            return back()->withInput()->with('toast_error', 'Nama Outlet Harus Diisi');
        }
        if (empty($paket)) {
            return back()->withInput()->with('toast_error', 'Nama Paket Harus Diisi');
        }
        if (empty($berat)) {
            return back()->withInput()->with('toast_error', 'Berat Harus Diisi');
        }
        // if (empty($biaya_tambahan)) {
        //     return back()->withInput()->with('toast_error', 'Biaya_tambahan Harus Diisi');
        // }
        // if (empty($diskon)) {
        //     return back()->withInput()->with('toast_error', 'Diskon Harus Diisi');
        // }
        // if (empty($pajak)) {
        //     return back()->withInput()->with('toast_error', 'Pajak Harus Diisi');
        // }
        if (empty($tgl)) {
            return back()->withInput()->with('toast_error', 'Tanggal Harus Diisi');
        }
        // $paket = paket::where('id_paket', $paket)->get();
        //kode transaksi
        $transaksi = transaksi::orderBy('id_transaksi', 'DESC')->first();
        if ($transaksi) {
            $kode_transaksi = 'TR-000' . ((int)substr($transaksi->kode_transaksi, 6) + 1);
        } else {
            $kode_transaksi = 'TR-0001';
        }

        //simpan
        $transaksi = new transaksi();
        $transaksi->kode_transaksi = $kode_transaksi;
        $transaksi->kode_invoice = '-';

        $transaksi->member_id = $member;
        $transaksi->outlet_id = $outlet;
        $transaksi->paket_id = $paket;
        $transaksi->tgl = date('Y-m-d', strtotime($tgl));
        $transaksi->tgl_selesai = null;
        $transaksi->tgl_bayar = null;
        $transaksi->biaya_tambahan = $biaya_tambahan;
        $transaksi->diskon = $diskon;
        $transaksi->pajak = $pajak;
        $transaksi->status_transaksi = 'Baru';
        $transaksi->status_pembayaran = 'Belum Dibayar';
        $transaksi->user_id = $user_id;
        $transaksi->save();

        if ($transaksi) {
            $transaksi = transaksi::where('id_transaksi', $transaksi->id_transaksi)->first();
            $transaksi->kode_invoice = date('dmY') . '' . $transaksi->id_transaksi;
            $transaksi->save();

            $transaksi_detail = new transaksi_detail();
            $transaksi_detail->transaksi_id = $transaksi->id_transaksi;
            $transaksi_detail->paket_id = $paket;
            $transaksi_detail->qty = $berat;
            $transaksi_detail->save();
        }

        if ($transaksi) {
            return redirect()->route('transaksi')->with('toast_success', 'Berhasil Menyimpan Data');
        } else {
            return back()->withInput()->with('toast_error', 'Gagal Menyimpan Data');
        }
    }

    public function show($id)
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->submenu;
        // $data['user'] = User::where('level', 'user')->get();
        // $data['transaksi'] = transaksi::where('id_transaksi', $id)->first();
        // $data['outlet'] = outlet::all();
        // $data['member'] = member::all();
        // $data['paket'] = paket::all();
        // $data['transaksiDetail'] = transaksiDetail::where('id_transaksi', $id)->first();

        $data['transaksi'] = Transaksi::with([
            'user',
            'transaksiDetail' => function ($td) {
                $td->with(['paket']);
            }
        ])
            ->where('id_transaksi', $id)
            ->first();

        $data['total_jumlah_transaksi'] = Transaksi::selectRaw("SUM(p.harga*td.qty) as jumlah")
            ->join('transaksi_detail as td', 'td.transaksi_id', 'transaksi.id_transaksi')
            ->join('paket as p', 'p.id_paket', 'td.paket_id')
            ->where('id_transaksi', $id)
            ->first()->jumlah;

        return view($this->directory . '.show', $data);
    }

    public function edit($id)
    {
        // dd($id);
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;
        $data['outlet'] = outlet::all();
        $data['member'] = member::all();
        $data['paket'] = paket::all();
        $data['transaksi_detail'] = transaksi_detail::all();
        // $data['transaksi'] = transaksi::where('id_transaksi', $id)->first();
        $data['transaksi'] = Transaksi::with([
            'user',
            'outlet',
            'transaksiDetail' => function ($td) {
                $td->with(['paket']);
            }
        ])
            ->where('id_transaksi', $id)
            ->first();


        return view($this->directory . '.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $nama_transaksi = $request->nama_transaksi;
        $harga = $request->harga;
        $deskripsi = $request->deskripsi;
        // dd($request);
        //pengecekan
        if (empty($nama_transaksi)) {
            // return back()->withInput()->with('errors','<h1><b>Oops!!</b></h1> <br> Nama_transaksi Lengkap Harus Diisi');
            return back()->withInput()->with('toast_error', 'Nama transaksi Lengkap Harus Diisi');
        }
        if (empty($harga)) {
            return back()->withInput()->with('toast_error', 'Harga Harus Diisi');
        }
        if (empty($deskripsi)) {
            return back()->withInput()->with('toast_error', 'No Telepon Harus Diisi');
        }


        //simpan
        $transaksi = transaksi::where('id_transaksi', $id)->first();
        $transaksi->nama_transaksi = $nama_transaksi;
        $transaksi->harga = $harga;
        $transaksi->deskripsi = $deskripsi;
        $transaksi->save();

        if ($transaksi) {
            return redirect()->route('transaksi')->with('toast_success', 'Berhasil Merubah Data');
        } else {
            return back()->withInput()->with('toast_error', 'Gagal Merubah Data');
        }
    }

    public function destroy($id)
    {
        $transaksi_detail = transaksi_detail::where('transaksi_id', $id)->first();
        if (!empty($transaksi_detail)) {
            $transaksi_detail-> delete();

                $transaksi = transaksi::where('id_transaksi', $id)->first();
                if (!empty($transaksi)) {
                    $transaksi->delete();
                    return redirect()->route('transaksi')->with('toast_success', 'Berhasil Menghapus Data');
                } else {
                    return back()->withInput()->with('toast_error', 'Gagal Menghapus Data');
                }
        }
        // $transaksi_detail = transaksi_detail::where('transaksi_id', $id)->first();
        // if (!empty($transaksi_detail)) {
        //     $transaksi_detail-> delete();

        //         $transaksi = transaksi::where('id_transaksi', $id)->first();
        //         if (!empty($transaksi)) {
        //             $transaksi->delete();
        //             return redirect()->route('transaksi')->with('toast_success', 'Berhasil Menghapus Data');
        //         } else {
        //             return back()->withInput()->with('toast_error', 'Gagal Menghapus Data');
        //         }
        // }
    }

    //ubah status
    public function statusproses($id)
    {
        $transaksi = Transaksi::where('id_transaksi', $id)->first();
        if (!empty($transaksi)) {
            if ($transaksi->status_transaksi == 'Baru' || $transaksi->status_transaksi == 'Diambil' || $transaksi->status_transaksi == 'Selesai') {
                $transaksi->status_transaksi = 'Proses';
                $transaksi->kode_invoice = date('dmY') . '' . $transaksi->id_transaksi;
                $transaksi->save();

                if ($transaksi) {
                    return redirect()->route('transaksi')->with('toast_success', 'Berhasil Memproses Transaksi');
                } else {
                    return redirect()->route('transaksi')->with('toast_error', 'Gagal Memproses Transaksi');
                }
            } else {
                return redirect()->route('transaksi')->with('toast_error', 'Status Transaksi Tidak Sesuai');
            }
        } else {
            return redirect()->route('transaksi')->with('toast_error', 'Gagal Menolak Transaksi');
        }
    }

    public function statusdiambil($id)
    {
        $transaksi = Transaksi::where('id_transaksi', $id)->first();
        if (!empty($transaksi)) {
            if ($transaksi->status_transaksi == 'Baru' || $transaksi->status_transaksi == 'Proses' || $transaksi->status_transaksi == 'Selesai') {
                $transaksi->status_transaksi = 'Diambil';
                $transaksi->kode_invoice = date('dmY') . '' . $transaksi->id_transaksi;
                $transaksi->save();

                if ($transaksi) {
                    return redirect()->route('transaksi')->with('toast_success', 'Berhasil Memproses Transaksi');
                } else {
                    return redirect()->route('transaksi')->with('toast_error', 'Gagal Memproses Transaksi');
                }
            } else {
                return redirect()->route('transaksi')->with('toast_error', 'Status Transaksi Tidak Sesuai');
            }
        } else {
            return redirect()->route('transaksi')->with('toast_error', 'Gagal Menolak Transaksi');
        }
    }

    public function statusselesai($id)
    {
        $transaksi = Transaksi::where('id_transaksi', $id)->first();
        if (!empty($transaksi)) {
            if ($transaksi->status_transaksi == 'Diambil' || $transaksi->status_transaksi == 'Baru' || $transaksi->status_transaksi == 'Proses') {
                $transaksi->status_transaksi = 'Selesai';
                $transaksi->save();

                if ($transaksi) {
                    return redirect()->route('transaksi')->with('toast_success', 'Berhasil Menyelesaikan Transaksi');
                } else {
                    return redirect()->route('transaksi')->with('toast_error', 'Gagal Menyelesaikan Transaksi');
                }
            } else {
                return redirect()->route('transaksi')->with('toast_error', 'Status Transaksi Tidak Sesuai');
            }
        } else {
            return redirect()->route('transaksi')->with('toast_error', 'Gagal Menyelesaikan Transaksi');
        }
    }

    //bayar
    public function bayar($id)
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;
        $data['transaksi'] = transaksi::where('id_transaksi', $id)->first();
        $data['member'] = member::all();
        return view($this->directory . '.bayar', $data);
    }
    public function bayarstore(Request $request)
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
            return redirect()->route('transaksiMainDiambil')->with('toast_success', 'Berhasil Menyimpan Data');
        } else {
            return back()->withInput()->with('toast_error', 'Gagal Menyimpan Data');
        }
    }
    public function nota($id)
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;
        $data['transaksi'] = transaksi::where('id_transaksi', $id)->first();
        $data['transaksiDetail'] = transaksi_detail::where('transaksi_id', $id)->first();
        $data['member'] = member::all();
        return view($this->directory . '.nota', $data);
    }
    public function printnota()
    {
        # code...
    }
}
