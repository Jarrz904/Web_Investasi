<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Data dummy untuk statistik
        $stats = [
            'total_investasi' => 'Rp 12.5 Triliun',
            'proyek_aktif' => 48,
            'investor_baru' => 12,
            'kunjungan' => '1,240'
        ];

        return view('admin.dashboard', compact('stats'));
    }
}