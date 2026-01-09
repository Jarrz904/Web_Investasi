<?php

namespace App\Http\Controllers;

use App\Models\Potensi;
use App\Models\Peluang;
use App\Models\Galeri;
use App\Models\Sektor;    // Tambahan: Pastikan Model Sektor di-import
use App\Models\Kecamatan; // Tambahan: Pastikan Model Kecamatan di-import
use Illuminate\Http\Request;

class InvestasiController extends Controller
{
    /**
     * Halaman Beranda: Menampilkan potensi terbaru/unggulan
     */
    public function index() {
        // 1. Mengambil potensi terbaru (untuk seksi Sektor Unggulan)
        $potensiUnggulan = Potensi::latest()->take(3)->get();

        // 2. Mengambil peluang investasi terbaru (untuk seksi Peluang Terbaru)
        $peluangTerbaru = Peluang::with(['sektor', 'kecamatan'])->latest()->take(3)->get();

        // 3. Mengambil perusahaan unggulan (menggunakan data Peluang)
        // PERBAIKAN: Mengambil relasi sektor dan kecamatan agar tidak error 'Column not found'
        $perusahaanUnggulan = Peluang::with(['sektor', 'kecamatan'])
                                     ->whereNotNull('nama_proyek')
                                     ->latest()
                                     ->take(3)
                                     ->get()
                                     ->map(function($item) {
                                         // Sinkronisasi property agar sesuai dengan variabel yang dipanggil di View Beranda
                                         $item->nama_perusahaan = $item->nama_proyek;
                                         $item->nilai_investasi = $item->nilai_investasi ?? 0;
                                         // Mengambil nama dari relasi
                                         $item->nama_sektor = $item->sektor->nama_sektor ?? '-';
                                         $item->nama_kecamatan = $item->kecamatan->nama_kecamatan ?? '-';
                                         $item->logo = null;
                                         return $item;
                                     });

        return view('beranda', compact('potensiUnggulan', 'peluangTerbaru', 'perusahaanUnggulan'));
    }

    /**
     * --- GRUP POTENSI (Dropdown Navigasi) ---
     */

    public function potensi() {
        $semuaPotensi = Potensi::all();
        return view('pages.potensi.index', compact('semuaPotensi'));
    }

    public function profilWilayah() {
        return view('pages.potensi.profil');
    }

    public function subWilayah() {
        return view('pages.potensi.sub_wilayah');
    }

    public function sektor() {
        // Mengambil kategori unik dari tabel potensi untuk ditampilkan di halaman sektor
        $daftarSektor = Potensi::select('kategori')->distinct()->get();
        return view('pages.potensi.sektor', compact('daftarSektor'));
    }

    public function spatialPlan() {
        return view('pages.potensi.spatial');
    }

    /**
     * --- GRUP PELUANG ---
     */

    public function peluang() {
        // PERBAIKAN: Menambahkan data Sektor dan Kecamatan untuk dropdown filter di Blade
        $semuaPeluang = Peluang::with(['sektor', 'kecamatan'])->latest()->get();
        $semuaSektor = Sektor::all();
        $semuaKecamatan = Kecamatan::all();
        
        return view('pages.peluang', compact('semuaPeluang', 'semuaSektor', 'semuaKecamatan'));
    }

    public function detailPeluang($id) {
        $peluang = Peluang::with(['sektor', 'kecamatan'])->findOrFail($id);
        return view('pages.peluang_detail', compact('peluang'));
    }

    /**
     * --- PETA INVESTASI ---
     */

    public function peta() {
        // Memastikan hanya mengambil data yang memiliki koordinat agar tidak error di Leaflet/Google Maps
        $semuaPeluang = Peluang::with(['sektor', 'kecamatan'])
                               ->whereNotNull('lat')
                               ->whereNotNull('lng')
                               ->get();
        
        // PERBAIKAN: Mengirimkan data filter agar peta.blade tidak error Undefined Variable
        $semuaSektor = Sektor::all();
        $semuaKecamatan = Kecamatan::all();
                               
        return view('pages.peta', compact('semuaPeluang', 'semuaSektor', 'semuaKecamatan'));
    }

    /**
     * --- PERUSAHAAN ---
     */

    public function perusahaan() {
        // PERBAIKAN: Menggunakan with() untuk mengambil data dari tabel kecamatans dan sektors
        $semuaPerusahaan = Peluang::with(['sektor', 'kecamatan'])
                                  ->whereNotNull('nama_proyek')
                                  ->latest()
                                  ->get()
                                  ->map(function($item) {
                                      // Menyesuaikan alias agar tidak merusak tampilan blade yang memanggil 'nama_perusahaan'
                                      $item->nama_perusahaan = $item->nama_proyek;
                                      return $item;
                                  });

        return view('pages.perusahaan', compact('semuaPerusahaan'));
    }

    /**
     * Fungsi Detail Perusahaan
     */
    public function detailPerusahaan($id) {
        $perusahaan = Peluang::with(['sektor', 'kecamatan'])->findOrFail($id);
        
        // Tetap mengirimkan object tunggal ke view perusahaan
        return view('pages.perusahaan', compact('perusahaan'));
    }

    /**
     * --- GALERI ---
     */

    public function galeri() {
        $semuaGaleri = Galeri::latest()->get();
        return view('pages.galeri', compact('semuaGaleri'));
    }

    /**
     * --- KONTAK ---
     */

    public function kontak() {
        return view('pages.kontak');
    }
}