@extends('layouts.admin')

@section('content')
<div class="space-y-10 pb-10">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 animate-fade-in">
        <div>
            <h1 class="text-4xl font-black text-gray-900 tracking-tight uppercase leading-none">
                Admin <span class="text-[#8D734B]">Insights</span>
            </h1>
            <p class="text-gray-500 font-medium mt-2 flex items-center gap-2">
                <span class="w-2 h-2 bg-green-500 rounded-full animate-ping"></span>
                Sistem berjalan optimal hari ini. Selamat bekerja, Admin!
            </p>
        </div>
        <div class="bg-white px-6 py-3 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-4">
            <div class="text-right">
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Periode Laporan</p>
                <p class="text-sm font-bold text-gray-800">{{ now()->format('d M Y') }}</p>
            </div>
            <i class="fas fa-calendar-alt text-[#8D734B] text-xl"></i>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach([
            ['label' => 'Total Investasi', 'value' => $stats['total_investasi'], 'icon' => 'fa-money-bill-trend-up', 'color' => 'from-blue-600 to-blue-400', 'bg' => 'blue'],
            ['label' => 'Proyek Aktif', 'value' => $stats['proyek_aktif'], 'icon' => 'fa-city', 'color' => 'from-emerald-600 to-emerald-400', 'bg' => 'emerald'],
            ['label' => 'Investor Baru', 'value' => $stats['investor_baru'], 'icon' => 'fa-user-tie', 'color' => 'from-amber-600 to-amber-400', 'bg' => 'amber'],
            ['label' => 'Kunjungan Portal', 'value' => $stats['kunjungan'], 'icon' => 'fa-chart-line', 'color' => 'from-purple-600 to-purple-400', 'bg' => 'purple'],
        ] as $card)
        <div class="group relative bg-white p-1 rounded-[2.5rem] transition-all duration-500 hover:shadow-[0_30px_60px_-15px_rgba(0,0,0,0.1)] overflow-hidden">
            <div class="bg-white p-7 rounded-[2.4rem] border border-gray-50 relative z-10 h-full flex flex-col justify-between">
                <div class="flex items-start justify-between">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br {{ $card['color'] }} shadow-lg shadow-{{ $card['bg'] }}-200 flex items-center justify-center text-white text-xl transform group-hover:rotate-6 transition-transform duration-500">
                        <i class="fas {{ $card['icon'] }}"></i>
                    </div>
                    <div class="flex flex-col items-end">
                        <span class="text-[10px] font-black text-emerald-500 bg-emerald-50 px-2 py-1 rounded-lg uppercase tracking-wider">+12.5%</span>
                    </div>
                </div>
                
                <div class="mt-8">
                    <h3 class="text-gray-400 text-[11px] font-black uppercase tracking-[0.2em] mb-1">{{ $card['label'] }}</h3>
                    <p class="text-2xl font-black text-gray-900 tracking-tighter group-hover:text-[#8D734B] transition-colors">{{ $card['value'] }}</p>
                </div>

                <div class="mt-4 flex items-end gap-1 h-8 opacity-20 group-hover:opacity-100 transition-opacity">
                    @for($i=0; $i<8; $i++)
                        <div class="flex-1 bg-{{ $card['bg'] }}-400 rounded-t-sm" style="height: {{ rand(30, 100) }}%"></div>
                    @endfor
                </div>
            </div>
            <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-gradient-to-br {{ $card['color'] }} opacity-0 group-hover:opacity-10 blur-2xl transition-opacity"></div>
        </div>
        @endforeach
    </div>

    <div class="bg-white rounded-[3rem] border border-gray-100 shadow-sm overflow-hidden transition-all duration-500 hover:shadow-2xl hover:shadow-gray-200/50">
        <div class="p-8 md:p-10 border-b border-gray-50 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-[#8D734B]/10 rounded-2xl flex items-center justify-center text-[#8D734B]">
                    <i class="fas fa-list-check text-xl"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-black text-gray-900 uppercase tracking-tight">Proyek <span class="text-[#8D734B]">Prioritas</span></h2>
                    <p class="text-sm text-gray-400 font-medium">Monitoring progres proyek investasi terbaru</p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <div class="relative">
                    <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                    <input type="text" placeholder="Cari Proyek..." class="pl-11 pr-6 py-3 bg-gray-50 border-none rounded-2xl text-sm focus:ring-2 focus:ring-[#8D734B]/20 w-full md:w-64 transition-all">
                </div>
                <button class="bg-[#1a1a1a] hover:bg-black text-white p-3.5 rounded-2xl transition-all">
                    <i class="fas fa-filter"></i>
                </button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-gray-50/50 text-gray-400 text-[10px] font-black uppercase tracking-[0.2em]">
                        <th class="px-10 py-5">Nama Proyek</th>
                        <th class="px-10 py-5">Sektor</th>
                        <th class="px-10 py-5">Nilai Investasi</th>
                        <th class="px-10 py-5">Status</th>
                        <th class="px-10 py-5 text-center">Tindakan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse(['Kawasan Industri Margasari', 'Wisata Guci Modern', 'Pabrik Tekstil Adiwerna'] as $index => $proyek)
                    <tr class="group hover:bg-[#8D734B]/[0.02] transition-all duration-300">
                        <td class="px-10 py-7">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-xl bg-gray-100 flex items-center justify-center text-gray-400 group-hover:bg-[#8D734B] group-hover:text-white transition-all">
                                    <i class="fas fa-briefcase text-sm"></i>
                                </div>
                                <span class="font-bold text-gray-800 tracking-tight">{{ $proyek }}</span>
                            </div>
                        </td>
                        <td class="px-10 py-7 text-sm text-gray-500 font-medium tracking-wide">
                            {{ $index == 1 ? 'Pariwisata' : 'Manufaktur' }}
                        </td>
                        <td class="px-10 py-7 font-black text-gray-900">
                            Rp {{ 150 * ($index + 1) }} Miliar
                        </td>
                        <td class="px-10 py-7">
                            <span class="inline-flex items-center gap-2 px-4 py-1.5 bg-emerald-50 text-emerald-600 text-[10px] font-black uppercase rounded-full border border-emerald-100 tracking-widest">
                                <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span>
                                Tersedia
                            </span>
                        </td>
                        <td class="px-10 py-7 text-center">
                            <div class="flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button class="w-9 h-9 rounded-xl bg-white border border-gray-100 text-gray-400 hover:text-blue-500 hover:border-blue-200 transition-all shadow-sm">
                                    <i class="fas fa-edit text-xs"></i>
                                </button>
                                <button class="w-9 h-9 rounded-xl bg-white border border-gray-100 text-gray-400 hover:text-red-500 hover:border-red-200 transition-all shadow-sm">
                                    <i class="fas fa-trash text-xs"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    @keyframes fade-in {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fade-in 0.8s ease-out forwards;
    }
</style>
@endsection