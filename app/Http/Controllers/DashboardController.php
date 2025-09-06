<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa_MI;
use App\Models\Guru_MI;
use App\Models\Pembayaran_MI;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik kartu
        $jumlahSiswa = Siswa_MI::count();
        $jumlahGuru = Guru_MI::count();
        $totalPembayaran = Pembayaran_MI::where('status','lunas')->sum('jumlah');
        $jumlahTransaksi = Pembayaran_MI::where('status','lunas')->count();

        // Chart pembayaran & transaksi per bulan
        $pembayaranPerBulan = [];
        $transaksiPerBulan = [];
        for($i=1; $i<=12; $i++){
            $pembayaranPerBulan[] = Pembayaran_MI::where('status','lunas')
                ->whereMonth('tanggal', $i)
                ->sum('jumlah');

            $transaksiPerBulan[] = Pembayaran_MI::where('status','lunas')
                ->whereMonth('tanggal', $i)
                ->count();
        }

        // Chart jumlah siswa per tahun
        $jumlahSiswaPerTahun = Siswa_MI::select('tahun', DB::raw('count(*) as total'))
            ->groupBy('tahun')
            ->pluck('total','tahun')
            ->toArray();

        // Chart jumlah guru per mapel
        $jumlahGuruPerMapel = Guru_MI::select('mapel', DB::raw('count(*) as total'))
            ->groupBy('mapel')
            ->pluck('total','mapel')
            ->toArray();

        return view('dashboard', compact(
            'jumlahSiswa','jumlahGuru','totalPembayaran','jumlahTransaksi',
            'pembayaranPerBulan','transaksiPerBulan','jumlahSiswaPerTahun','jumlahGuruPerMapel'
        ));
    }
}
