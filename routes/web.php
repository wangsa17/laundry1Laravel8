<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\PesanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', function () {
//     return view('user.layout.app');
// });
Route::get('/loginmember', [AuthController::class, 'loginmember'])->name('loginMember');
// Route::post('/postloginmember', [AuthController::class, 'postloginmember'])->name('postLoginMember');
Route::get('/logoutmember', [AuthController::class, 'logoutmember'])->name('logoutMember');

//member
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/home', [HomeController::class, 'main'])->name('home');
Route::get('/outlet', [HomeController::class, 'outlet'])->name('outletUser');

Route::get('/paket', [HomeController::class, 'paket'])->name('paketUser');
Route::get('/pesan/{id}', [PesanController::class, 'index'])->name('pesan');
// Route::post('/checkout/{id}', [PesanController::class, 'main'])->name('userCheckout');
Route::post('/pesanProses', [PesanController::class, 'proses'])->name('pesanProses');
Route::get('/history', [PesanController::class, 'history'])->name('history');
Route::get('/detailhistory/{id}', [PesanController::class, 'detailhistory'])->name('detailhistory');
Route::get('/bayarUser/{id}', [PesanController::class, 'bayarUser'])->name('bayarUser');
Route::post('/bayarStoreUser', [PesanController::class, 'bayarstoreuser'])->name('bayarStoreUser');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/postlogin', [AuthController::class, 'postlogin'])->name('postlogin');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::group(['prefix' => 'datauser'], function () {
            Route::group(['prefix' => 'kasir'], function () {
                Route::get('/', [UserController::class, 'index'])->name('user');
                Route::get('/create', [UserController::class, 'create'])->name('userCreate');
                Route::post('/store', [UserController::class, 'store'])->name('userStore');
                Route::get('/edit/{id}', [UserController::class, 'edit'])->name('userEdit');
                Route::post('/update/{id}', [UserController::class, 'update'])->name('userUpdate');
                Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('userDelete');
            });
            Route::group(['prefix' => 'datamember'], function () {
                Route::get('/', [MemberController::class,  'index'])->name('member');
                Route::get('/create', [MemberController::class, 'create'])->name('memberCreate');
                Route::post('/store', [MemberController::class, 'store'])->name('memberStore');
                Route::get('/edit/{id}', [MemberController::class, 'edit'])->name('memberEdit');
                Route::post('/update/{id}', [MemberController::class, 'update'])->name('memberUpdate');
                Route::get('/delete/{id}', [MemberController::class, 'destroy'])->name('memberDelete');
            });
        });
        Route::group(['prefix' => 'datamaster'], function () {
            Route::group(['prefix' => 'dataoutlet'], function () {
                Route::get('/', [OutletController::class, 'index'])->name('outlet');
                Route::get('/create', [OutletController::class, 'create'])->name('outletCreate');
                Route::post('/store', [OutletController::class, 'store'])->name('outletStore');
                Route::get('/edit/{id}', [OutletController::class, 'edit'])->name('outletEdit');
                Route::post('/update/{id}', [OutletController::class, 'update'])->name('outletUpdate');
                Route::get('/delete/{id}', [OutletController::class, 'destroy'])->name('outletDelete');
            });
            Route::group(['prefix' => 'datapaket'], function () {
                Route::get('/', [PaketController::class, 'index'])->name('paket');
                Route::get('/create', [PaketController::class, 'create'])->name('paketCreate');
                Route::post('/store', [PaketController::class, 'store'])->name('paketStore');
                Route::get('/edit/{id}', [PaketController::class, 'edit'])->name('paketEdit');
                Route::post('/update/{id}', [PaketController::class, 'update'])->name('paketUpdate');
                Route::get('/delete/{id}', [PaketController::class, 'destroy'])->name('paketDelete');
            });
        });
        Route::group(['prefix' => 'transaksi'], function () {
            Route::get('/', [TransaksiController::class, 'index'])->name('transaksi');
            Route::get('/mainproses', [TransaksiController::class, 'mainproses'])->name('transaksiMainProses');
            Route::get('/maindiambil', [TransaksiController::class, 'maindiambil'])->name('transaksiMainDiambil');
            Route::get('/mainselesai', [TransaksiController::class, 'mainselesai'])->name('transaksiMainSelesai');
            //crud
            Route::get('/create', [TransaksiController::class, 'create'])->name('transaksiCreate');
            Route::post('/store', [TransaksiController::class, 'store'])->name('transaksiStore');
            Route::get('/edit/{id}', [TransaksiController::class, 'edit'])->name('transaksiEdit');
            Route::post('/update', [TransaksiController::class, 'update'])->name('transaksiUpdate');
            Route::get('/show/{id}', [TransaksiController::class, 'show'])->name('transaksiShow');
            Route::get('/delete/{id}', [TransaksiController::class, 'destroy'])->name('transaksiDelete');
            //ubahstatus
            Route::get('/statusproses/{id}', [TransaksiController::class, 'statusproses'])->name('transaksiStatusProses');
            Route::get('/statuskirim/{id}', [TransaksiController::class, 'statusdiambil'])->name('transaksiStatusKirim');
            Route::get('/statusselesai/{id}', [TransaksiController::class, 'statusselesai'])->name('transaksiStatusSelesai');
            //Bayar
            Route::get('/bayar/{id}', [TransaksiController::class, 'bayar'])->name('transaksiBayar');
            Route::post('/bayarstore', [TransaksiController::class, 'bayarstore'])->name('transaksiBayarStore');
            //nota
            Route::get('/nota/{id}', [TransaksiController::class, 'nota'])->name('transaksiNota');
            Route::get('/printnota', [TransaksiController::class, 'printnota'])->name('transaksiprintnota');
        });
        Route::group(['prefix' => 'laporan'], function(){
            Route::get('/', [LaporanController::class, 'index'])->name('laporan');
        });
    });
});
