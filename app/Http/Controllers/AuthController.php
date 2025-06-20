<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function userPageHandler() {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login'); // fallback klo belum login
        }

        $role = $user->role;

        if ($role == "admin") {
            return redirect()->route('adm.home');
        } else if ($role == "mahasiswa") {
            return redirect()->route('mhs.home');
        } else {
            return abort(403, "Role is unknown!");
        }
    }

    public function showRegisterPage()
    {
        return view('auth.register');
    }

    public function storeInitialRegisterData(Request $request)
    {
        // Validasi dulu input awal
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        // Simpan data ke session
        $request->session()->put('register_data', $request->only('name', 'email', 'password'));

        // Redirect ke halaman lanjutan (GET)
        return redirect()->route('registerDataPage');
    }

    public function showRegisterDataPage()
    {
        // Simpan data awal ke session
        return view('auth.register_data');
    }

    public function handleRegister(Request $request)
    {
        $initialData = $request->session()->get('register_data');

        if (!$initialData) {
            return redirect()->route('registerpage')->with('error', 'Silakan isi form awal terlebih dahulu.');
        }

        $validator = Validator::make(array_merge($initialData, $request->all()), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'no_telp' => 'required|string',
            'jenis_kelamin' => 'required|in:lk,pr',
            'alamat' => 'required|string',
            'nama_ortu' => 'required|string',
            'domisili_ortu' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::create([
            'name' => $initialData['name'],
            'email' => $initialData['email'],
            'password' => Hash::make($initialData['password']),
            'no_telp' => $request->input('no_telp'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'alamat' => $request->input('alamat'),
            'nama_ortu' => $request->input('nama_ortu'),
            'domisili_ortu' => $request->input('domisili_ortu'),
            'is_ready' => 0
        ]);

        $request->session()->forget('register_data');

        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login!');
    }

    public function showLoginPage()
    {
        return view('auth.login');
    }

    public function handleLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('auth.home');
        }

        return redirect()->back()->with('error', 'Email atau password salah!');
    }

    public function showForgotPassword()
    {
        return view('auth.forgotPassword');
    }


    public function handleForgotPassword(Request  $request)
    {
        $credentials = $request->only('email', 'password');

        // Validasi dulu input awal
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
