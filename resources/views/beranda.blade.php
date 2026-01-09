@extends('layouts.app')

@section('content')
{{-- Background Tetap --}}
<div class="fixed inset-0 z-0">
    <img src="{{ asset('images/background.jpeg') }}" 
         class="w-full h-full object-cover scale-105" 
         alt="{{ __('Background Tegal') }}">
    <div class="absolute inset-0 bg-black/60"></div>
</div>

<div class="relative z-10 h-screen overflow-y-auto snap-y snap-mandatory scroll-smooth no-scrollbar" id="main-container">

    {{-- Hero Section --}}
   <section class="relative h-screen flex items-center justify-center overflow-hidden snap-start">
    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 5px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #8D734B;
            border-radius: 10px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #6b5638;
        }
    </style>

    <div class="container mx-auto px-4 text-center text-white">
        <h1 class="text-4xl md:text-6xl font-extrabold mb-4 drop-shadow-lg leading-tight" x-text="t('hero_title')">
            Selamat Datang di Portal Investasi Kabupaten Tegal
        </h1>
        <p class="text-lg md:text-xl opacity-90 mb-12 tracking-wide max-w-3xl mx-auto" x-text="t('hero_subtitle')">
            Temukan peluang investasi terbaik di pusat industri Jawa Tengah
        </p>

        <div class="max-w-5xl mx-auto bg-white/95 backdrop-blur-md p-4 md:p-6 rounded-2xl shadow-2xl border border-white/20">
            <form action="{{ route('peluang.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4 text-left">
                
                <div class="relative" x-data="{ open: false, selected: '', label: '' }" @click.away="open = false">
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform scale-95 translate-y-5"
                         x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                         class="absolute bottom-full z-50 w-full mb-2 bg-white border border-gray-100 rounded-xl shadow-2xl overflow-hidden">
                        <div class="max-h-60 overflow-y-auto custom-scrollbar">
                            <template x-for="kec in ['Adiwerna', 'Balapulang', 'Bojong', 'Bumijawa', 'Dukuhturi', 'Dukuhwaru', 'Jatinegara', 'Kedungbanteng', 'Kramat', 'Lebaksiu', 'Margasari', 'Pangkah', 'Slawi', 'Suradadi', 'Talang', 'Tarub', 'Warureja']">
                                <div @click="selected = kec; label = kec; open = false" 
                                     class="px-4 py-3 text-sm text-gray-700 hover:bg-[#8D734B] hover:text-white cursor-pointer transition-colors"
                                     x-text="kec">
                                </div>
                            </template>
                        </div>
                    </div>

                    <div @click="open = !open" class="w-full pl-10 pr-10 py-4 bg-gray-50 border border-gray-200 rounded-xl text-gray-700 cursor-pointer font-bold text-sm flex items-center justify-between focus:ring-2 focus:ring-[#8D734B]">
                        <div class="absolute left-3 text-[#8D734B]">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <span x-text="label || t('pilih_kecamatan')" class="truncate">Pilih Kecamatan</span>
                        <i class="fas fa-chevron-up text-xs text-gray-400 transition-transform" :class="open ? 'rotate-180' : ''"></i>
                    </div>
                    <input type="hidden" name="kecamatan" :value="selected">
                </div>

                <div class="relative" x-data="{ open: false, selected: '', label: '' }" @click.away="open = false">
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform scale-95 translate-y-5"
                         x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                         class="absolute bottom-full z-50 w-full mb-2 bg-white border border-gray-100 rounded-xl shadow-2xl overflow-hidden">
                        <div class="max-h-60 overflow-y-auto custom-scrollbar">
                            <template x-for="sektor in ['Manufaktur', 'Pertanian', 'Pariwisata', 'Perdagangan', 'Jasa', 'Infrastruktur']">
                                <div @click="selected = sektor; label = sektor; open = false" 
                                     class="px-4 py-3 text-sm text-gray-700 hover:bg-[#8D734B] hover:text-white cursor-pointer transition-colors"
                                     x-text="sektor">
                                </div>
                            </template>
                        </div>
                    </div>

                    <div @click="open = !open" class="w-full pl-10 pr-10 py-4 bg-gray-50 border border-gray-200 rounded-xl text-gray-700 cursor-pointer font-bold text-sm flex items-center justify-between focus:ring-2 focus:ring-[#8D734B]">
                        <div class="absolute left-3 text-[#8D734B]">
                            <i class="fas fa-industry"></i>
                        </div>
                        <span x-text="label || t('pilih_sektor')" class="truncate">Pilih Sektor</span>
                        <i class="fas fa-chevron-up text-xs text-gray-400 transition-transform" :class="open ? 'rotate-180' : ''"></i>
                    </div>
                    <input type="hidden" name="sektor" :value="selected">
                </div>

                <div class="relative">
                    <div class="absolute inset-y-0 left-3 flex items-center text-[#8D734B] pointer-events-none">
                        <i class="fas fa-search"></i>
                    </div>
                    <input type="text" name="keyword" :placeholder="t('kata_kunci')" 
                           class="w-full pl-10 pr-4 py-4 bg-gray-50 border border-gray-200 rounded-xl text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#8D734B] font-bold text-sm" placeholder="Kata Kunci">
                </div>

                <button type="submit" class="bg-[#8D734B] hover:bg-amber-900 text-white py-4 rounded-xl font-black flex items-center justify-center gap-2 transition duration-300 shadow-lg uppercase tracking-widest text-sm">
                    <i class="fas fa-search"></i> <span x-text="t('cari')">Cari</span>
                </button>
            </form>
        </div>
    </div>
</section>

    {{-- Peluang Section --}}
    <section class="relative h-screen flex items-center bg-white snap-start overflow-hidden">
        <div class="container mx-auto px-4 md:px-10">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h4 class="text-[#8D734B] font-black tracking-[0.3em] text-xs mb-2 uppercase" x-text="t('peluang')">{{ __('Peluang') }}</h4>
                    <h2 class="text-3xl font-black text-gray-800">
                        <span x-text="t('proyek_peluang')">{{ __('Proyek Peluang') }}</span> <span x-text="t('kabupaten_tegal')">{{ __('Kabupaten Tegal') }}</span>
                    </h2>
                </div>
                <a href="{{ route('peluang.index') }}" class="text-[#8D734B] font-bold text-sm hover:underline">
                    <span x-text="t('lihat_semua')">{{ __('Lihat Semua') }}</span> &rarr;
                </a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($peluangTerbaru ?? [
                    (object)['kategori' => 'Manufaktur', 'judul' => __('Kawasan Industri Terpadu'), 'deskripsi' => __('Pengembangan lahan industri modern di koridor utara Tegal.'), 'lokasi' => 'Kramat'],
                    (object)['kategori' => 'Pariwisata', 'judul' => __('Revitalisasi Guci'), 'deskripsi' => __('Investasi akomodasi bintang lima di kawasan wisata air panas.'), 'lokasi' => 'Bumijawa'],
                    (object)['kategori' => 'Agribisnis', 'judul' => __('Sentra Pertanian Modern'), 'deskripsi' => __('Pengolahan hasil pertanian berbasis teknologi tinggi.'), 'lokasi' => 'Bojong']
                ] as $peluang)
                <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100 hover:shadow-xl transition group">
                    <span class="bg-[#8D734B]/10 text-[#8D734B] text-[10px] font-bold px-3 py-1 rounded-full uppercase" x-text="t('{{ strtolower($peluang->kategori) }}')">{{ __($peluang->kategori) }}</span>
                    <h3 class="text-lg font-bold text-gray-800 mt-4 mb-2 group-hover:text-[#8D734B] transition">
                        {{ $peluang->judul }}
                    </h3>
                    <p class="text-gray-500 text-sm mb-6">
                        {{ Str::limit($peluang->deskripsi, 80) }}
                    </p>
                    <div class="flex justify-between items-center border-t pt-4">
                        <span class="text-xs font-bold text-gray-400"><i class="fas fa-map-marker-alt mr-1"></i> {{ $peluang->lokasi }}</span>
                        <a href="#" class="text-[#8D734B] text-xs font-black uppercase" x-text="t('selengkapnya')">{{ __('Selengkapnya') }}</a>
                    </div>
                </div>
                @empty
                <div class="col-span-3 flex flex-col items-center justify-center py-20 border-2 border-dashed border-gray-100 rounded-[3rem]">
                    <i class="fas fa-search-dollar text-6xl text-gray-200 mb-6"></i>
                    <h3 class="text-xl font-bold text-gray-400" x-text="t('data_kosong')">{{ __('Belum Ada Data Peluang') }}</h3>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Sub Wilayah Section --}}
    <section class="relative h-screen flex items-center bg-gray-50 snap-start overflow-hidden">
        <div class="container mx-auto px-4 md:px-10">
            <div class="text-center mb-10">
                <h4 class="text-[#8D734B] font-black tracking-[0.3em] text-xs mb-2 uppercase" x-text="t('sub_wilayah')">{{ __('Sub Wilayah') }}</h4>
                <h2 class="text-3xl font-black text-gray-800" x-text="t('pilih_kecamatan')">{{ __('Pilih Kecamatan') }}</h2>
            </div>
            
            <div class="max-w-5xl mx-auto">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 overflow-y-auto max-h-[65vh] p-4 no-scrollbar">
                    @foreach(['Adiwerna', 'Balapulang', 'Bojong', 'Bumijawa', 'Dukuhturi', 'Dukuhwaru', 'Jatinegara', 'Kedungbanteng', 'Kramat', 'Lebaksiu', 'Margasari', 'Pangkah', 'Slawi', 'Suradadi', 'Talang', 'Tarub', 'Warureja'] as $kec)
                    <a href="#" class="bg-white p-6 rounded-3xl text-center shadow-sm hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 border border-gray-100 group">
                        <div class="w-14 h-14 bg-gray-50 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-[#8D734B] transition-colors">
                            <i class="fas fa-map-marked-alt text-[#8D734B] text-xl group-hover:text-white"></i>
                        </div>
                        <span class="font-bold text-gray-700 text-sm block">{{ $kec }}</span>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Potensi Daerah Section --}}
    <section class="relative h-screen flex items-center bg-white snap-start overflow-hidden">
        <div class="container mx-auto px-4 md:px-10">
            <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-4">
                <div class="text-left">
                    <h4 class="text-[#8D734B] font-black tracking-[0.3em] text-xs mb-2 uppercase" x-text="t('potensi_daerah')">{{ __('Potensi Daerah') }}</h4>
                    <h2 class="text-4xl font-extrabold text-gray-800 leading-tight">
                        <span x-text="t('sektor_unggulan')">{{ __('Sektor Unggulan') }}</span> <br> <span x-text="t('kabupaten_tegal')">{{ __('Kabupaten Tegal') }}</span>
                    </h2>
                </div>
                <a href="{{ route('potensi.sektor') }}" class="px-6 py-3 bg-white border border-[#8D734B] text-[#8D734B] rounded-full font-bold hover:bg-[#8D734B] hover:text-white transition duration-300 text-sm uppercase tracking-wider">
                    <span x-text="t('lihat_semua')">{{ __('Lihat Semua') }}</span> &rarr;
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                @forelse($potensiUnggulan ?? [
                    (object)['kategori' => 'Industri', 'judul' => __('Industri Logam & Mesin'), 'deskripsi_singkat' => __('Pusat kerajinan logam terbaik yang menyuplai komponen nasional.'), 'gambar' => null],
                    (object)['kategori' => 'Pariwisata', 'judul' => __('Wisata Alam Guci'), 'deskripsi_singkat' => __('Destinasi wisata pemandian air panas alami di lereng Gunung Slamet.'), 'gambar' => null],
                    (object)['kategori' => 'Infrastruktur', 'judul' => __('Akses Tol Pejagan-Pemalang'), 'deskripsi_singkat' => __('Konektivitas logistik yang efisien melalui jaringan jalan tol Trans Jawa.'), 'gambar' => null]
                ] as $potensi)
                <div class="group bg-white rounded-[2.5rem] overflow-hidden shadow-md hover:shadow-2xl transition duration-500 border border-gray-100">
                    <div class="h-60 overflow-hidden relative">
                        <img src="{{ $potensi->gambar ? asset('storage/'.$potensi->gambar) : 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=800' }}" 
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                        <div class="absolute top-6 left-6 bg-white/90 backdrop-blur-md px-5 py-1.5 rounded-full shadow-sm">
                            <span class="text-[10px] font-black text-[#8D734B] tracking-widest uppercase" x-text="t('{{ strtolower($potensi->kategori) }}')">
                                {{ __($potensi->kategori) }}
                            </span>
                        </div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-xl font-extrabold text-gray-800 mb-4 group-hover:text-[#8D734B] transition">
                            {{ $potensi->judul }}
                        </h3>
                        <p class="text-gray-500 text-xs leading-relaxed mb-6">
                            {{ Str::limit($potensi->deskripsi_singkat, 100) }}
                        </p>
                        <a href="#" class="inline-flex items-center gap-2 text-xs font-black text-[#8D734B] group-hover:gap-4 transition-all uppercase tracking-widest">
                            <span x-text="t('selengkapnya')">{{ __('SELENGKAPNYA') }}</span> <i class="fas fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
        </div>
    </section>

    {{-- Perusahaan Section --}}
    <section class="relative h-screen flex items-center bg-gray-50 snap-start overflow-hidden">
        <div class="container mx-auto px-4 md:px-10">
            <div class="flex justify-between items-end mb-12">
                <div class="text-left">
                    <h4 class="text-[#8D734B] font-black tracking-[0.3em] text-xs mb-2 uppercase" x-text="t('perusahaan')">{{ __('Perusahaan') }}</h4>
                    <h2 class="text-3xl font-black text-gray-800" x-text="t('perusahaan_unggulan')">{{ __('Perusahaan Unggulan') }}</h2>
                </div>
                <a href="{{ route('perusahaan.index') }}" class="hidden md:flex items-center gap-2 bg-[#8D734B] text-white px-8 py-3 rounded-xl font-bold text-xs uppercase tracking-widest hover:bg-amber-900 transition shadow-lg">
                    <i class="fas fa-list"></i> <span x-text="t('perusahaan')">{{ __('Perusahaan') }}</span>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($perusahaanUnggulan ?? [
                    (object)['id' => 1, 'nama' => 'PT. Industri Kereta Api (INKA)', 'sektor' => 'Manufaktur', 'nilai_investasi' => 500000000000, 'kecamatan' => 'Kramat'],
                    (object)['id' => 2, 'nama' => 'PT. Adiwerna Metal Industri', 'sektor' => 'Logam', 'nilai_investasi' => 250000000000, 'kecamatan' => 'Adiwerna'],
                    (object)['id' => 3, 'nama' => 'PT. Tegal Wangi Indonesia', 'sektor' => 'Tekstil', 'nilai_investasi' => 125000000000, 'kecamatan' => 'Slawi']
                ] as $item)
                <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100 hover:shadow-2xl transition-all duration-500 group relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-[#8D734B]/5 rounded-bl-[4rem] -mr-8 -mt-8 group-hover:bg-[#8D734B]/10 transition"></div>
                    <div class="flex items-center gap-5 mb-8">
                        <div class="w-16 h-16 bg-gray-50 rounded-2xl flex items-center justify-center border border-gray-100">
                            <i class="fas fa-building text-2xl text-[#8D734B]/30"></i>
                        </div>
                        <div>
                            <h4 class="font-black text-gray-800 text-lg leading-tight group-hover:text-[#8D734B] transition">{{ $item->nama }}</h4>
                            <p class="text-[#8D734B] text-[10px] font-black tracking-widest uppercase mt-1" x-text="t('{{ strtolower($item->sektor) }}')">{{ __($item->sektor) }}</p>
                        </div>
                    </div>
                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-400" x-text="t('nilai_investasi')">{{ __('Nilai Investasi') }}</span>
                            <span class="font-bold text-gray-700">Rp {{ number_format($item->nilai_investasi, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-400" x-text="t('lokasi')">{{ __('Lokasi') }}</span>
                            <span class="font-bold text-gray-700">{{ $item->kecamatan }}</span>
                        </div>
                    </div>
                    <a href="{{ route('perusahaan.show', $item->id ?? 0) }}" class="block w-full py-4 text-center bg-gray-50 group-hover:bg-[#1A1A1A] text-gray-500 group-hover:text-white rounded-2xl font-black text-[10px] tracking-widest uppercase transition-all duration-300">
                        <span x-text="t('lihat_profil')">{{ __('Lihat Profil') }}</span>
                    </a>
                </div>
                @empty
                @endforelse
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="bg-[#1a1a1a] h-screen flex items-center relative overflow-hidden snap-start">
        <div class="absolute right-0 top-0 w-1/2 h-full bg-[#8D734B] opacity-5 -skew-x-12 translate-x-20"></div>
        <div class="container mx-auto px-4 md:px-10 relative z-10 text-center md:text-left flex flex-col md:flex-row items-center justify-between">
            <div class="max-w-2xl text-left">
                <h2 class="text-4xl font-extrabold text-white mb-6" x-text="t('cta_title')">{{ __('Siap Mengembangkan Bisnis Anda di Tegal?') }}</h2>
                <p class="text-gray-400 text-lg" x-text="t('cta_desc')">{{ __('Kami siap mendampingi proses investasi Anda mulai dari informasi lahan hingga izin operasional.') }}</p>
            </div>
            <div class="mt-10 md:mt-0">
                <a href="{{ route('kontak.index') }}" class="inline-block bg-[#8D734B] text-white px-12 py-5 rounded-2xl font-black text-sm tracking-widest hover:bg-amber-900 transition shadow-2xl uppercase" x-text="t('hubungi_kami')">
                    {{ __('Hubungi Kami Sekarang') }}
                </a>
            </div>
        </div>
    </section>
</div>

<style>
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    html, body { height: 100%; margin: 0; overflow: hidden; }
    @media (min-width: 768px) { .grid-cols-4 { grid-template-columns: repeat(4, minmax(0, 1fr)); } }
    /* Support RTL for Arabic */
    [dir="rtl"] .text-left { text-align: right; }
    [dir="rtl"] .text-right { text-align: left; }
</style>

<script>
    document.addEventListener('alpine:init', () => {
        // Objek translasi untuk 5 bahasa (Contoh isi)
        const translations = {
            id: {
                hero_title: 'Selamat Datang di Portal Investasi Kabupaten Tegal',
                hero_subtitle: 'Temukan peluang investasi terbaik di pusat industri Jawa Tengah',
                pilih_kecamatan: 'Pilih Kecamatan',
                pilih_sektor: 'Pilih Sektor',
                kata_kunci: 'Kata Kunci',
                cari: 'Cari',
                peluang: 'Peluang',
                proyek_peluang: 'Proyek Peluang',
                kabupaten_tegal: 'Kabupaten Tegal',
                lihat_semua: 'Lihat Semua',
                selengkapnya: 'Selengkapnya',
                data_kosong: 'Belum Ada Data Peluang',
                sub_wilayah: 'Sub Wilayah',
                potensi_daerah: 'Potensi Daerah',
                sektor_unggulan: 'Sektor Unggulan',
                perusahaan: 'Perusahaan',
                perusahaan_unggulan: 'Perusahaan Unggulan',
                nilai_investasi: 'Nilai Investasi',
                lokasi: 'Lokasi',
                lihat_profil: 'Lihat Profil',
                cta_title: 'Siap Mengembangkan Bisnis Anda di Tegal?',
                cta_desc: 'Kami siap mendampingi proses investasi Anda mulai dari informasi lahan hingga izin operasional.',
                hubungi_kami: 'Hubungi Kami Sekarang',
                manufaktur: 'Manufaktur',
                pertanian: 'Pertanian',
                pariwisata: 'Pariwisata',
                perdagangan: 'Perdagangan',
                jasa: 'Jasa',
                infrastruktur: 'Infrastruktur',
                logam: 'Logam',
                tekstil: 'Tekstil'
            },
            en: {
                hero_title: 'Welcome to Tegal Regency Investment Portal',
                hero_subtitle: 'Find the best investment opportunities in Central Java industrial hub',
                pilih_kecamatan: 'Select District',
                pilih_sektor: 'Select Sector',
                kata_kunci: 'Keyword',
                cari: 'Search',
                peluang: 'Opportunities',
                proyek_peluang: 'Opportunity Project',
                kabupaten_tegal: 'Tegal Regency',
                lihat_semua: 'View All',
                selengkapnya: 'Learn More',
                data_kosong: 'No Opportunity Data Available',
                sub_wilayah: 'Sub Regions',
                potensi_daerah: 'Regional Potential',
                sektor_unggulan: 'Leading Sectors',
                perusahaan: 'Company',
                perusahaan_unggulan: 'Leading Companies',
                nilai_investasi: 'Investment Value',
                lokasi: 'Location',
                lihat_profil: 'View Profile',
                cta_title: 'Ready to Develop Your Business in Tegal?',
                cta_desc: 'We are ready to assist your investment process from land information to operational permits.',
                hubungi_kami: 'Contact Us Now',
                manufaktur: 'Manufacturing',
                pertanian: 'Agriculture',
                pariwisata: 'Tourism',
                perdagangan: 'Trade',
                jasa: 'Service',
                infrastruktur: 'Infrastructure',
                logam: 'Metal',
                tekstil: 'Textile'
            },
            zh: {
                hero_title: '欢迎来到直葛县投资门户',
                hero_subtitle: '在中爪哇工业中心寻找最佳投资机会',
                pilih_kecamatan: '选择地区',
                pilih_sektor: '选择行业',
                kata_kunci: '关键词',
                cari: '搜索',
                peluang: '机会',
                proyek_peluang: '机会项目',
                kabupaten_tegal: '直葛县',
                lihat_semua: '查看全部',
                selengkapnya: '了解更多',
                data_kosong: '暂无机会数据',
                sub_wilayah: '子区域',
                potensi_daerah: '区域潜力',
                sektor_unggulan: '主导产业',
                perusahaan: '公司',
                perusahaan_unggulan: '领先公司',
                nilai_investasi: '投资价值',
                lokasi: '地点',
                lihat_profil: '查看简介',
                cta_title: '准备好在直葛发展您的业务了吗？',
                cta_desc: '我们准备协助您的投资过程，从土地信息到经营许可。',
                hubungi_kami: '立即联系我们',
                manufaktur: '制造业',
                pertanian: '农业',
                pariwisata: '旅游业',
                perdagangan: '贸易',
                jasa: '服务',
                infrastruktur: '基础设施'
            },
            ja: {
                hero_title: 'テガル県投資ポータルへようこそ',
                hero_subtitle: '中部ジャワの工業中心地で最高の投資機会を見つける',
                pilih_kecamatan: '地区を選択',
                pilih_sektor: 'セクターを選択',
                kata_kunci: 'キーワード',
                cari: '検索',
                peluang: '機会',
                proyek_peluang: '機会プロジェクト',
                kabupaten_tegal: 'テガル県',
                lihat_semua: 'すべて見る',
                selengkapnya: '詳細はこちら',
                data_kosong: '機会データはありません',
                sub_wilayah: 'サブ地域',
                potensi_daerah: '地域の可能性',
                sektor_unggulan: '主要セクター',
                perusahaan: '企業',
                perusahaan_unggulan: '主要企業',
                nilai_investasi: '投資額',
                lokasi: '所在地',
                lihat_profil: 'プロフィールを見る',
                cta_title: 'テガルでビジネスを展開する準備はできていますか？',
                cta_desc: '土地情報から営業許可まで、投資プロセスをサポートする準備ができています。',
                hubungi_kami: '今すぐお問い合わせ',
                manufaktur: '製造業',
                pertanian: '農業',
                pariwisata: '観光',
                perdagangan: '貿易',
                jasa: 'サービス',
                infrastruktur: 'インフラ'
            },
        };

        // Integrasi dengan Alpine.js yang biasanya ada di layout.app
        // Jika di layout belum ada logic t(), tambahkan ini:
        Alpine.data('rootData', () => ({
            currentLang: document.documentElement.lang || 'id',
            t(key) {
                return translations[this.currentLang][key] || translations['en'][key] || key;
            }
        }));
    });

    const scrollContainer = document.querySelector('#main-container');
    if(scrollContainer) {
        scrollContainer.addEventListener('scroll', () => {
            // Logic scroll snap
        });
    }
</script>
@endsection