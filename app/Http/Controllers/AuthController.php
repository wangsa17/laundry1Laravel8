<?php

namespace App\Http\Controllers;

use App\Models\member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }
    public function postlogin(Request $request)
    {
        // dd($request);
        $email = strip_tags($request->email);
        $password = strip_tags($request->password);

        if (empty($email)) {
            return back()->withInput()->with('toast_error', 'Email Harus Diisi');
        }
        if (empty($password)) {
            return back()->withInput()->with('toast_error', 'Password Harus Diisi');
        }

        $user = User::where('email', $email)->first();
        $member = member::where('email', $email)->first();

        if (!empty($member)) {
            $data = [
                'email' => $member->email,
                'password' => $password
            ];

            if (Auth::attempt($data)) {
                return redirect()->route('home')
                    ->with('toast_success', 'Selamat datang ' . $member->nama);
            } else {
                return redirect()->route('loginMember')->with('toast_error', 'akun tidak terdaftar pada system');
            }
        } elseif (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard')->with('toast_success', 'Selamat Datang ' . $user->nama);
        } else {
            return redirect()->route('login')->with('toast_error', 'akun tidak terdaftar pada system');
        }
        // dd($request);
        // $data=$request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);
        // if (Auth::attempt($data)) {
        //     $user=User::where('email', $request->email)->first();
        //     $request->session()->regenerate();
        //     if ($user->role =='Admin') {
        //         return redirect()->route('dashboard')->with('toast_success', 'Selamat datang ' . $user->nama);
        //     } elseif ($user->role=='Kasir') {
        //         return redirect()->route('dashboard')->with('toast_success', 'Selamat datang ' . $user->nama);
        //     } elseif ($user->role=='Owner') {
        //         return redirect()->route('dashboard')->with('toast_success', 'Selamat datang ' . $user->nama);
        //     } else {
        //         return back()->withInput();
        //     }
        // }  else {
        //     return back()->withInput();
        // }

    }

    public function logout()
    {
        Auth::logout();
        session_start();
        session_destroy();

        return redirect()->route('login')->with('toast_success', 'Berhasil Logout');
    }
    public function loginmember()
    {
        return view('user.auth.login');
    }

    public function logoutmember()
    {
        Auth::logout();
        session_start();
        session_destroy();

        return redirect()->route('loginMember')->with('toast_success', 'Berhasil Logout');
    }
}
