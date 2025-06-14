<?php

namespace App\Http\Controllers;

use App\Models\Skripsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $totalmahasiswa = User::where('role', 'mahasiswa')->count();

        return view("dashboard.admin.home", compact('totalmahasiswa'));
    }

    public function showDataAdminSidebar()
    {
        $adminData1 = auth()->user();

        return view('dashboard.admin.partials.sidebar', compact('adminData'));
    }

    public function showDataAdminHeader()
    {
        $adminData2 = auth()->user();

        return view('dashboard.admin.partials.header', compact('adminData'));
    }

    public function ShowJadwal()
    {
        $mahasiswa = User::where('role', 'mahasiswa')->get();
        $dosen = User::where('role', 'dosen')->get();

        return view('dashboard.admin.jadwal', compact('mahasiswa', 'dosen'));
    }
}
