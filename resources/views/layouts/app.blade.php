<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investasi Kabupaten Tegal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Memastikan dropdown tidak tertutup konten main */
        .group:hover .group-hover\:visible {
            visibility: visible;
        }

        /* Smooth transition untuk Alpine x-show */
        [x-cloak] {
            display: none !important;
        }

        /* Custom Scrollbar untuk Dropdown yang panjang */
        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #8D734B;
            border-radius: 10px;
        }
    </style>
</head>

<body class="bg-gray-50 flex flex-col min-h-screen" x-data="langApp" x-cloak>

    <div
        class="bg-[#8D734B] text-white py-2 px-4 md:px-10 flex flex-wrap justify-between items-center text-xs md:text-sm relative z-[10000]">
        <div class="flex items-center">
            <i class="fas fa-envelope mr-2"></i>
            <a href="mailto:pmptsp@tegalkab.go.id" class="hover:underline">pmptsp@tegalkab.go.id</a>
        </div>
        <div class="flex gap-4 items-center">
            <div class="relative inline-block text-left" x-data="{ open: false }">
                <button @click="open = !open" @click.away="open = false"
                    class="flex items-center gap-2 px-3 py-1.5 rounded-lg hover:bg-white/10 transition-all duration-200 cursor-pointer focus:outline-none">
                    <img :src="getFlagUrl(currentLang)" class="w-5 h-auto rounded-sm object-cover shadow-sm"
                        alt="Current Language">
                    <span class="text-white text-sm font-bold tracking-wide uppercase flex items-center">
                        <span x-text="currentLang"></span>
                        <i class="fas fa-chevron-down ml-1.5 text-[10px] transition-transform duration-300"
                            :class="open ? 'rotate-180' : ''"></i>
                    </span>
                </button>

                <div x-show="open" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="transform opacity-0 scale-95 -translate-y-2"
                    x-transition:enter-end="transform opacity-100 scale-100 translate-y-0"
                    class="absolute right-0 mt-3 w-48 origin-top-right bg-white rounded-2xl shadow-2xl ring-1 ring-black ring-opacity-5 z-[9999] overflow-hidden border border-gray-100">

                    <div class="py-1">
                        <template x-for="(label, code) in languages" :key="code">
                            <a href="javascript:void(0)" @click="setLanguage(code); open = false"
                                class="group flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-amber-50 transition-colors border-t border-gray-50 first:border-0">
                                <img :src="getFlagUrl(code)" class="w-5 h-auto mr-3 rounded-sm shadow-sm" :alt="label">
                                <span class="font-bold group-hover:text-[#8D734B]" x-text="label"></span>
                            </a>
                        </template>
                    </div>
                </div>
            </div>

            <div class="h-4 w-[1px] bg-white/30"></div>
            <a href="/login" class="hover:underline" x-text="t('masuk')">Masuk</a>
        </div>
    </div>

    <nav class="bg-white shadow-md py-4 px-4 md:px-10 flex items-center justify-between sticky top-0 z-50">
        <div class="flex items-center">
            <a href="{{ route('beranda') }}">
                <img src="{{ asset('images/logo.png') }}" class="h-10 md:h-14 mr-3 object-contain"
                    alt="Logo Kabupaten Tegal">
            </a>
        </div>

        <ul
            class="hidden lg:flex gap-6 md:gap-8 font-bold text-[#8D734B] text-xs md:text-sm tracking-widest uppercase items-center">
            <li>
                <a href="{{ route('beranda') }}"
                    class="hover:text-amber-900 transition {{ Request::is('/') ? 'text-amber-900' : '' }}"
                    x-text="t('beranda')">Beranda</a>
            </li>

            <li class="relative group py-4">
                <button class="hover:text-amber-900 flex items-center gap-1 transition uppercase focus:outline-none">
                    <span x-text="t('potensi')">Potensi</span>
                    <i
                        class="fas fa-chevron-down text-[10px] group-hover:rotate-180 transition-transform duration-300"></i>
                </button>

                <ul
                    class="absolute left-0 mt-2 w-64 bg-white border border-gray-100 rounded-xl shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-[100] overflow-hidden">
                    <li>
                        <a href="{{ route('potensi.profil') }}"
                            class="flex items-center gap-3 px-5 py-4 text-gray-700 hover:bg-amber-50 hover:text-[#8D734B] transition border-b border-gray-50">
                            <i class="fas fa-map-marker-alt w-5 text-center text-[#8D734B]"></i>
                            <span class="font-bold text-[11px]" x-text="t('profil_wilayah')">PROFIL WILAYAH</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('potensi.sub') }}"
                            class="flex items-center gap-3 px-5 py-4 text-gray-700 hover:bg-amber-50 hover:text-[#8D734B] transition border-b border-gray-50">
                            <i class="fas fa-map w-5 text-center text-[#8D734B]"></i>
                            <span class="font-bold text-[11px]" x-text="t('sub_wilayah')">SUB WILAYAH</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('potensi.sektor') }}"
                            class="flex items-center gap-3 px-5 py-4 text-gray-700 hover:bg-amber-50 hover:text-[#8D734B] transition border-b border-gray-50">
                            <i class="fas fa-industry w-5 text-center text-[#8D734B]"></i>
                            <span class="font-bold text-[11px]" x-text="t('sektor')">SEKTOR</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('potensi.spatial') }}"
                            class="flex items-center gap-3 px-5 py-4 text-gray-700 hover:bg-amber-50 hover:text-[#8D734B] transition">
                            <i class="fas fa-store w-5 text-center text-[#8D734B]"></i>
                            <span class="font-bold text-[11px]" x-text="t('umkm')">UMKM</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="{{ route('peluang.index') }}"
                    class="hover:text-amber-900 transition {{ Request::is('peluang*') ? 'text-amber-900' : '' }}"
                    x-text="t('peluang')">Peluang</a>
            </li>
            <li>
                <a href="{{ route('peta.index') }}"
                    class="hover:text-amber-900 transition {{ Request::is('peta-investasi*') ? 'text-amber-900' : '' }}"
                    x-text="t('peta_investasi')">Peta Investasi</a>
            </li>
            <li>
                <a href="{{ route('perusahaan.index') }}"
                    class="hover:text-amber-900 transition {{ Request::is('perusahaan*') ? 'text-amber-900' : '' }}"
                    x-text="t('perusahaan')">Perusahaan</a>
            </li>
            <li>
                <a href="{{ route('galeri.index') }}"
                    class="hover:text-amber-900 transition {{ Request::is('galeri*') ? 'text-amber-900' : '' }}"
                    x-text="t('galeri')">Galeri</a>
            </li>
            <li>
                <a href="{{ route('kontak.index') }}"
                    class="hover:text-amber-900 flex items-center gap-1 transition {{ Request::is('kontak*') ? 'text-amber-900' : '' }}"
                    x-text="t('kontak')">Kontak</a>
            </li>
        </ul>

        <div class="lg:hidden text-[#8D734B]">
            <i class="fas fa-bars text-2xl"></i>
        </div>
    </nav>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="bg-gray-900 text-white py-8 mt-10">
        <div class="container mx-auto px-4 md:px-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-6 text-left items-start">
                <div>
                    <img src="{{ asset('images/logo.png') }}" class="h-12 mb-3 grayscale brightness-200 object-contain"
                        alt="Logo">
                    <p class="text-xs opacity-60 leading-relaxed max-w-xs" x-text="t('footer_desc')">
                        Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu (DPMPTSP) Kabupaten Tegal.
                    </p>
                </div>

                <div>
                    <h4 class="text-sm font-bold text-amber-500 mb-3 uppercase tracking-wider"
                        x-text="t('tautan_cepat')">Tautan Cepat</h4>
                    <ul class="text-xs space-y-2 opacity-70">
                        <li><a href="{{ route('potensi.profil') }}" class="hover:text-amber-500 transition"
                                x-text="t('profil_wilayah')">Profil Wilayah</a></li>
                        <li><a href="{{ route('peta.index') }}" class="hover:text-amber-500 transition"
                                x-text="t('peta_investasi')">Peta Investasi</a></li>
                        <li><a href="{{ route('kontak.index') }}" class="hover:text-amber-500 transition"
                                x-text="t('hubungi_kami')">Hubungi Kami</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-sm font-bold text-amber-500 mb-3 uppercase tracking-wider"
                        x-text="t('kontak_kami')">Kontak Kami</h4>
                    <ul class="text-xs space-y-2 opacity-70 mb-4">
                        <li><i class="fas fa-phone-alt mr-2 text-amber-500"></i> (0283) 491827</li>
                        <li><i class="fas fa-map-marker-alt mr-2 text-amber-500"></i> Jl. Dr. Soetomo No. 1, Slawi</li>
                    </ul>
                    <div class="flex gap-4 text-lg">
                        <a href="#" class="text-white opacity-50 hover:opacity-100 hover:text-pink-500 transition"><i
                                class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white opacity-50 hover:opacity-100 hover:text-blue-600 transition"><i
                                class="fab fa-facebook"></i></a>
                        <a href="#" class="text-white opacity-50 hover:opacity-100 hover:text-sky-400 transition"><i
                                class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white opacity-50 hover:opacity-100 hover:text-red-600 transition"><i
                                class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>

            <div class="border-t border-white/5 pt-6 text-center">
                <p class="font-bold text-amber-500 mb-1 tracking-[0.2em] text-[10px] uppercase">DPMPTSP KABUPATEN TEGAL
                </p>
                <p class="text-[9px] opacity-40 uppercase tracking-widest">
                    &copy; 2026 <span x-text="t('copyright')">Pemerintah Kabupaten Tegal. Hak Cipta Dilindungi.</span>
                </p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('langApp', () => ({
                currentLang: localStorage.getItem('selectedLang') || 'id',
                languages: {
                    id: 'Indonesia',
                    en: 'English',
                    jp: 'Japan',
                    kr: 'Korea',
                    cn: 'China'
                },
                translations: {
                    id: {
                        masuk: 'Masuk', daftar: 'Daftar', beranda: 'Beranda', potensi: 'Potensi', profil_wilayah: 'PROFIL WILAYAH', sub_wilayah: 'SUB WILAYAH', sektor: 'SEKTOR', umkm: 'UMKM', peluang: 'Peluang', peta_investasi: 'Peta Investasi', perusahaan: 'Perusahaan', galeri: 'Galeri', kontak: 'Kontak', footer_desc: 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu (DPMPTSP) Kabupaten Tegal.', tautan_cepat: 'Tautan Cepat', kontak_kami: 'Kontak Kami', copyright: 'Pemerintah Kabupaten Tegal. Hak Cipta Dilindungi.',
                        hero_title: 'Selamat Datang di Portal Investasi Kabupaten Tegal',
                        hero_subtitle: 'Temukan peluang investasi terbaik di pusat industri Jawa Tengah',
                        pilih_kecamatan: 'Pilih Kecamatan', pilih_sektor: 'Pilih Sektor', kata_kunci: 'Kata Kunci...', cari: 'Cari',
                        proyek_peluang: 'Proyek Peluang', target_investasi: 'Target Investasi', unit_kecamatan: 'Kecamatan', layanan_izin: 'Layanan Perizinan',
                        potensi_daerah: 'POTENSI DAERAH', sektor_unggulan: 'Sektor Unggulan', kabupaten_tegal: 'Kabupaten Tegal', lihat_semua: 'Lihat Semua Potensi', selengkapnya: 'SELENGKAPNYA', data_kosong: 'Belum ada data.',
                        cta_title: 'Siap Mengembangkan Bisnis Anda di Tegal?', cta_desc: 'Kami siap mendampingi proses investasi Anda.', hubungi_kami: 'Hubungi Kami Sekarang',
                        'sektor investasi': 'Sektor Investasi',
                        'peluang investasi subtitle': 'Peluang Investasi di Berbagai Sektor',
                        'hero sektor desc': 'Kabupaten Tegal menawarkan berbagai peluang investasi di berbagai sektor yang menjanjikan dengan dukungan infrastruktur dan kebijakan yang mendukung.',
                        'jelajahi sektor desc': 'Jelajahi berbagai sektor investasi yang tersedia di Kabupaten Tegal.',
                        perusahaan_unggulan: 'PERUSAHAAN UNGGULAN',
                        daftar_perusahaan_desc: 'Daftar perusahaan besar yang telah berinvestasi di Kabupaten Tegal.',
                        peluang_investasi: 'PELUANG INVESTASI',
                        lihat_semua_perusahaan: 'LIHAT SEMUA PERUSAHAAN',
                        detail_peluang: 'DETAIL PELUANG',
                        lokasi: 'LOKASI',
                        nilai_investasi: 'NILAI INVESTASI',
                        bidang_usaha: 'BIDANG USAHA',
                        akomodasi_makan_minum: 'Akomodasi dan Makan Minum',
                        pertanian: 'Pertanian',
                        kesenian_hiburan_rekreasi: 'Kesenian, Hiburan dan Rekreasi',
                        konstruksi: 'Konstruksi',
                        pendidikan: 'Pendidikan',
                        teknologi_informasi: 'Teknologi dan Informasi',
                        kesehatan: 'Kesehatan',
                        semua_sektor: 'Semua Sektor',
                        semua_kecamatan: 'Semua Kecamatan',
                        urutkan_terbaru: 'Terbaru',
                        urutkan_terlama: 'Terlama',
                        cari_proyek: 'Cari Proyek Investasi...',
                        filter_pencarian: 'Filter Pencarian',
                        hasil_pencarian: 'Hasil Pencarian',
                        title: 'Peluang Investasi Strategis',
                        subtitle: 'Temukan berbagai potensi proyek unggulan di Kabupaten Tegal yang siap untuk dikembangkan bersama mitra strategis.',
                        pilih_kecamatan: 'Pilih Kecamatan',
                        pilih_sektor: 'Pilih Sektor',
                        cari_proyek: 'Cari nama proyek...',
                        btn_cari: 'CARI',
                        filter_by: 'Filter Berdasarkan',
                        nilai_investasi: 'Nilai Investasi',
                        triliun: 'Triliun',
                        min: 'Min',
                        max: 'Max',
                        apply_filter: 'TERAPKAN FILTER',
                        kat_sektor: 'Kategori Sektor',
                        pariwisata: 'Pariwisata',
                        industri: 'Industri',
                        pertanian: 'Pertanian',
                        lihat_lainnya: 'LIHAT LAINNYA',
                        klasifikasi: 'Klasifikasi Proyek',
                        strategis: 'STRATEGIS',
                        prospektif: 'PROSPEKTIF',
                        daftar_proyek: 'Daftar Proyek',
                        ditemukan: 'Ditemukan',
                        sesuai_kriteria: 'proyek yang sesuai dengan kriteria Anda.',
                        urutkan: 'Urutkan',
                        terbaru: 'Terbaru',
                        nilai_tertinggi: 'Nilai Tertinggi',
                        tersedia: 'Tersedia',
                        estimasi: 'Estimasi Investasi',
                        detail: 'LIHAT DETAIL PROYEK',
                        tidak_ada: 'Tidak Ada Hasil',
                        msg_tidak_ada: 'Maaf, proyek tidak ditemukan. Coba atur ulang filter.',
                        reset: 'Atur Ulang Filter'
                    },
                    en: {
                        masuk: 'Login', daftar: 'Register', beranda: 'Home', potensi: 'Potential', profil_wilayah: 'REGION PROFILE', sub_wilayah: 'SUB REGION', sektor: 'SECTOR', umkm: 'MSME', peluang: 'Opportunities', peta_investasi: 'Investment Map', perusahaan: 'Companies', galeri: 'Gallery', kontak: 'Contact', footer_desc: 'Department of Investment and Integrated One-Stop Services (DPMPTSP) Tegal Regency.', tautan_cepat: 'Quick Links', kontak_kami: 'Contact Us', copyright: 'Tegal Regency Government. All Rights Reserved.',
                        hero_title: 'Welcome to Tegal Investment Portal',
                        hero_subtitle: 'Find the best investment opportunities in Central Java',
                        pilih_kecamatan: 'Select District', pilih_sektor: 'Select Sector', kata_kunci: 'Keywords...', cari: 'Search',
                        proyek_peluang: 'Opportunity Projects', target_investasi: 'Investment Target', unit_kecamatan: 'Districts', layanan_izin: 'Licensing Services',
                        potensi_daerah: 'REGIONAL POTENTIAL', sektor_unggulan: 'Leading Sectors', kabupaten_tegal: 'Tegal Regency', lihat_semua: 'View All Potentials', selengkapnya: 'READ MORE', data_kosong: 'No data available.',
                        cta_title: 'Ready to Grow Your Business in Tegal?', cta_desc: 'We are ready to assist your investment process.', hubungi_kami: 'Contact Us Now',
                        'sektor investasi': 'Investment Sector',
                        'peluang investasi subtitle': 'Investment Opportunities in Various Sectors',
                        'hero sektor desc': 'Tegal Regency offers various promising investment opportunities in various sectors with the support of infrastructure and supportive policies.',
                        'jelajahi sektor desc': 'Explore various investment sectors available in Tegal Regency.',
                        perusahaan_unggulan: 'FEATURED COMPANIES',
                        daftar_perusahaan_desc: 'List of major companies that have invested in Tegal Regency.',
                        peluang_investasi: 'INVESTMENT OPPORTUNITIES',
                        lihat_semua_perusahaan: 'VIEW ALL COMPANIES',
                        detail_peluang: 'OPPORTUNITY DETAILS',
                        lokasi: 'LOCATION',
                        nilai_investasi: 'INVESTMENT VALUE',
                        bidang_usaha: 'BUSINESS FIELD',
                        akomodasi_makan_minum: 'Accommodation and Food Service',
                        pertanian: 'Agriculture',
                        kesenian_hiburan_rekreasi: 'Arts, Entertainment and Recreation',
                        konstruksi: 'Construction',
                        pendidikan: 'Education',
                        teknologi_informasi: 'Information and Technology',
                        kesehatan: 'Health',
                        semua_sektor: 'All Sectors',
                        semua_kecamatan: 'All Districts',
                        urutkan_terbaru: 'Newest',
                        urutkan_terlama: 'Oldest',
                        cari_proyek: 'Search Investment Projects...',
                        filter_pencarian: 'Search Filter',
                        hasil_pencarian: 'Search Results',
                        title: 'Strategic Investment Opportunities',
                        subtitle: 'Discover various flagship project potentials in Tegal Regency ready for development with strategic partners.',
                        pilih_kecamatan: 'Select District',
                        pilih_sektor: 'Select Sector',
                        cari_proyek: 'Search project name...',
                        btn_cari: 'SEARCH',
                        filter_by: 'Filter By',
                        nilai_investasi: 'Investment Value',
                        triliun: 'Trillion',
                        min: 'Min',
                        max: 'Max',
                        apply_filter: 'APPLY FILTER',
                        kat_sektor: 'Sector Category',
                        pariwisata: 'Tourism',
                        industri: 'Industry',
                        pertanian: 'Agriculture',
                        lihat_lainnya: 'SEE MORE',
                        klasifikasi: 'Project Classification',
                        strategis: 'STRATEGIC',
                        prospektif: 'PROSPECTIVE',
                        daftar_proyek: 'Project List',
                        ditemukan: 'Found',
                        sesuai_kriteria: 'projects matching your criteria.',
                        urutkan: 'Sort',
                        terbaru: 'Latest',
                        nilai_tertinggi: 'Highest Value',
                        tersedia: 'Available',
                        estimasi: 'Estimated Investment',
                        detail: 'VIEW PROJECT DETAIL',
                        tidak_ada: 'No Results Found',
                        msg_tidak_ada: 'Sorry, no projects found. Try resetting the filter.',
                        reset: 'Reset Filter'

                    },
                    jp: {
                        masuk: 'ログイン', daftar: '登録', beranda: 'ホーム', potensi: '可能性', profil_wilayah: '地域プロフィール', sub_wilayah: 'サブ地域', sektor: 'セクター', umkm: '中小企業', peluang: '機会', peta_investasi: '投資マップ', perusahaan: '企業', galeri: 'ギャラリー', kontak: '連絡先', footer_desc: 'テガル県投資・ワンストップサービス局 (DPMPTSP)。', tautan_cepat: 'クイックリンク', kontak_kami: 'お問い合わせ', copyright: 'テガル県政府。全著作権所有。',
                        hero_title: 'テガル投資ポータルへようこそ',
                        hero_subtitle: '中部ジャワの産業の中心地で最高の投資機会を見つける',
                        pilih_kecamatan: '地区を選択', pilih_sektor: 'セクターを選択', kata_kunci: 'キーワード...', cari: '検索',
                        proyek_peluang: '機会プロジェクト', target_investasi: '投資目標', unit_kecamatan: '地区', layanan_izin: 'ライセンスサービス',
                        potensi_daerah: '地域の可能性', sektor_unggulan: '主要セクター', kabupaten_tegal: 'テガル県', lihat_semua: 'すべての可能性を見る', selengkapnya: '詳細を見る', data_kosong: 'データがありません。',
                        cta_title: 'テガルでビジネスを成長させる準備はできていますか？', cta_desc: '私たちはあなたの投資プロセスを支援する準備ができています。', hubungi_kami: '今すぐお問い合わせ',
                        'sektor investasi': '投資セクター',
                        'peluang investasi subtitle': '様々なセクターにおける投資機会',
                        'hero sektor desc': 'テガル県は、インフラと支援政策に支えられ、様々なセクターで有望な投資機会を提供しています。',
                        'jelajahi sektor desc': 'テガル県で利用可能な様々な投資セクターを探索してください。',
                        perusahaan_unggulan: '主要企業',
                        daftar_perusahaan_desc: 'テガル県に投資した主要企業のリスト。',
                        peluang_investasi: '投資機会',
                        lihat_semua_perusahaan: 'すべての企業を表示',
                        detail_peluang: '機会の詳細',
                        lokasi: '場所',
                        nilai_investasi: '投資額',
                        bidang_usaha: '事業分野',
                        akomodasi_makan_minum: '宿泊・飲食業',
                        pertanian: '農業',
                        kesenian_hiburan_rekreasi: '芸術・娯楽・レクリエーション',
                        konstruksi: '建設',
                        pendidikan: '教育',
                        teknologi_informasi: '情報技術',
                        kesehatan: '保健衛生',
                        semua_sektor: 'すべてのセクター',
                        semua_kecamatan: 'すべての地区',
                        urutkan_terbaru: '最新順',
                        urutkan_terlama: '古い順',
                        cari_proyek: '投資プロジェクトを検索...',
                        filter_pencarian: '検索フィルター',
                        hasil_pencarian: '検索結果',
                        title: '戦略的投資機会',
                        subtitle: 'テガル県における戦略的パートナーとの開発に向けた、主要プロジェクトの可能性を発見してください。',
                        pilih_kecamatan: '地区を選択',
                        pilih_sektor: 'セクターを選択',
                        cari_proyek: 'プロジェクト名で検索...',
                        btn_cari: '検索',
                        filter_by: 'フィルター',
                        nilai_investasi: '投资额',
                        triliun: '兆',
                        min: '最小',
                        max: '最大',
                        apply_filter: 'フィルターを適用',
                        kat_sektor: 'セクターカテゴリー',
                        pariwisata: '観光',
                        industri: '工業',
                        pertanian: '農業',
                        lihat_lainnya: 'もっと見る',
                        klasifikasi: 'プロジェクト分類',
                        strategis: '戦略的',
                        prospektif: '有望',
                        daftar_proyek: 'プロジェクト一覧',
                        ditemukan: '見つかりました',
                        sesuai_kriteria: '件のプロジェクトが条件に一致します。',
                        urutkan: '並び替え',
                        terbaru: '最新',
                        nilai_tertinggi: '最高額',
                        tersedia: '利用可能',
                        estimasi: '投資見積もり',
                        detail: 'プロジェクト詳細を見る',
                        tidak_ada: '結果が見つかりません',
                        msg_tidak_ada: '申し訳ありません。プロジェクトが見つかりませんでした。',
                        reset: 'フィルターをリセット'
                    },
                    kr: {
                        masuk: '로그인', daftar: '등록', beranda: '홈', potensi: '잠재력', profil_wilayah: '지역 프로필', sub_wilayah: '하위 지역', sektor: '부문', umkm: '중소기업', peluang: '기회', peta_investasi: '투자 지도', perusahaan: '회사', galeri: '갤러리', kontak: '연락처', footer_desc: '테갈 리젠시 투자 및 원스톱 통합 서비스국 (DPMPTSP).', tautan_cepat: '빠른 링크', kontak_kami: '문의처', copyright: '테갈 리젠시 정부. 모든 권리 보유.',
                        hero_title: '테갈 투자 포털에 오신 것을 환영합니다',
                        hero_subtitle: '중부 자바 산업의 중심에서 최고의 투자 기회를 찾으십시오',
                        pilih_kecamatan: '지역 선택', pilih_sektor: '부문 선택', kata_kunci: '키워드...', cari: '검색',
                        proyek_peluang: '기회 프로젝트', target_investasi: '투자 목표', unit_kecamatan: '지역', layanan_izin: '인허가 서비스',
                        potensi_daerah: '지역 잠재력', sektor_unggulan: '주요 부문', kabupaten_tegal: '테갈 리젠시', lihat_semua: '모든 잠재력 보기', selengkapnya: '더 보기', data_kosong: '데이터가 없습니다.',
                        cta_title: '테갈에서 비즈니스를 성장시킬 준비가 되셨습니까?', cta_desc: '귀하의 투자 과정을 도울 준비가 되어 있습니다.', hubungi_kami: '지금 문의하십시오',
                        'sektor investasi': '투자 부문',
                        'peluang investasi subtitle': '다양한 부문의 투자 기회',
                        'hero sektor desc': '테갈 리젠시는 인프라와 지원 정책을 바탕으로 다양한 부문에서 유망한 투자 기회를 제공합니다.',
                        'jelajahi sektor desc': '테갈 리젠시에서 이용 가능한 다양한 투자 부문을 살펴보십시오.',
                        perusahaan_unggulan: '주요 기업',
                        daftar_perusahaan_desc: '테갈 리젠시에 투자한 주요 기업 목록.',
                        peluang_investasi: '투자 기회',
                        lihat_semua_perusahaan: '모든 회사 보기',
                        detail_peluang: '기회 상세 정보',
                        lokasi: '위치',
                        nilai_investasi: '투자 가치',
                        bidang_usaha: '사업 분야',
                        akomodasi_makan_minum: '숙박 및 음식점업',
                        pertanian: '농업',
                        kesenian_hiburan_rekreasi: '예술, 스포츠 및 여가관련 서비스업',
                        konstruksi: '건설업',
                        pendidikan: '교육 서비스업',
                        teknologi_informasi: '정보통신업',
                        kesehatan: '보건업',
                        semua_sektor: '모든 부문',
                        semua_kecamatan: '모든 지역',
                        urutkan_terbaru: '최신순',
                        urutkan_terlama: '오래된순',
                        cari_proyek: '투자 프로젝트 검색...',
                        filter_pencarian: '검색 필터',
                        hasil_pencarian: '검색 결과',
                        title: '전략적 투자 기회',
                        subtitle: '전략적 파트너와 함께 개발할 준비가 된 테갈 군(Tegal Regency)의 다양한 주요 프로젝트 잠재력을 발견하십시오.',
                        pilih_kecamatan: '지역 선택',
                        pilih_sektor: '분야 선택',
                        cari_proyek: '프로젝트 이름 검색...',
                        btn_cari: '검색',
                        filter_by: '필터 기준',
                        nilai_investasi: '투자 가치',
                        triliun: '조',
                        min: '최소',
                        max: '최대',
                        apply_filter: '필터 적용',
                        kat_sektor: '분야 카테고리',
                        pariwisata: '관광',
                        industri: '산업',
                        pertanian: '농업',
                        lihat_lainnya: '더 보기',
                        klasifikasi: '프로젝트 분류',
                        strategis: '전략적',
                        prospektif: '유망함',
                        daftar_proyek: '프로젝트 목록',
                        ditemukan: '찾음',
                        sesuai_kriteria: '개의 프로젝트가 기준에 부합합니다.',
                        urutkan: '정렬',
                        terbaru: '최신순',
                        nilai_tertinggi: '최고 가치순',
                        tersedia: '이용 가능',
                        estimasi: '예상 투자액',
                        detail: '프로젝트 상세 정보 보기',
                        tidak_ada: '결과 없음',
                        msg_tidak_ada: '죄송합니다. 프로젝트를 찾을 수 없습니다. 필터를 초기화해 보세요.',
                        reset: '필터 초기화'
                    },
                    cn: {
                        masuk: '登录', daftar: '注册', beranda: '首页', potensi: '潜力', profil_wilayah: '地区概况', sub_wilayah: '子区域', sektor: '部门', umkm: '中小企业', peluang: '投资机会', peta_investasi: '投资地图', perusahaan: '公司', galeri: '图库', kontak: '联系我们', footer_desc: '德加尔县投资与一站式综合服务局 (DPMPTSP)。', tautan_cepat: '快速链接', kontak_kami: '联系我们', copyright: '德加尔县政府。版权所有。',
                        hero_title: '欢迎来到德加尔投资门户',
                        hero_subtitle: '在中爪哇省工业中心寻找最佳投资机会',
                        pilih_kecamatan: '选择地区', pilih_sektor: '选择部门', kata_kunci: '关键词...', cari: '搜索',
                        proyek_peluang: '机会项目', target_investasi: '投资目标', unit_kecamatan: '地区', layanan_izin: '许可服务',
                        potensi_daerah: '地区潜力', sektor_unggulan: '重点部门', kabupaten_tegal: '德加尔县', lihat_semua: '查看所有潜力', selengkapnya: '查看更多', data_kosong: '暂无数据。',
                        cta_title: '准备好在德加尔发展您的业务了吗？', cta_desc: '我们随时准备协助您的投资过程。', hubungi_kami: '立即联系我们',
                        'sektor investasi': '投资部门',
                        'peluang investasi subtitle': '各领域的投资机会',
                        'hero sektor desc': '在基础设施 and 政策的支持下，德加尔县在各个领域提供各种极具前景的投资机会。',
                        'jelajahi sektor desc': '探索德加尔县现有的各个投资领域。',
                        perusahaan_unggulan: '重点企业',
                        daftar_perusahaan_desc: '在德加尔县投资的主要公司名单。',
                        peluang_investasi: '投资机会',
                        lihat_semua_perusahaan: '查看所有公司',
                        detail_peluang: '投资详情',
                        lokasi: '地点',
                        nilai_investasi: '投资价值',
                        bidang_usaha: '业务领域',
                        akomodasi_makan_minum: '住宿和餐饮业',
                        pertanian: '农业',
                        kesenian_hiburan_rekreasi: '艺术、娱乐和休闲',
                        konstruksi: '建筑业',
                        pendidikan: '教育',
                        teknologi_informasi: '信息技术',
                        kesehatan: '卫生',
                        semua_sektor: '所有部门',
                        semua_kecamatan: '所有地区',
                        urutkan_terbaru: '最新',
                        urutkan_terlama: '最早',
                        cari_proyek: '搜索投资项目...',
                        filter_pencarian: '搜索筛选',
                        hasil_pencarian: '搜索结果',
                        title: '战略投资机会',
                        subtitle: '发掘德加尔县（Tegal Regency）准备与战略合作伙伴共同开发的各项重点项目潜力。',
                        pilih_kecamatan: '选择地区',
                        pilih_sektor: '选择部门',
                        cari_proyek: '搜索项目名称...',
                        btn_cari: '搜索',
                        filter_by: '筛选依据',
                        nilai_investasi: '投资价值',
                        triliun: '万亿',
                        min: '最小',
                        max: '最大',
                        apply_filter: '应用筛选',
                        kat_sektor: '行业分类',
                        pariwisata: '旅游业',
                        industri: '工业',
                        pertanian: '农业',
                        lihat_lainnya: '查看更多',
                        klasifikasi: '项目分类',
                        strategis: '战略性',
                        prospektif: '预期性',
                        daftar_proyek: '项目列表',
                        ditemukan: '找到',
                        sesuai_kriteria: '个符合您标准的项目。',
                        urutkan: '排序',
                        terbaru: '最新',
                        nilai_tertinggi: '最高价值',
                        tersedia: '可用',
                        estimasi: '预计投资',
                        detail: '查看项目详情',
                        tidak_ada: '未找到结果',
                        msg_tidak_ada: '抱歉，未找到项目。请尝试重置筛选器。',
                        reset: '重置筛选器'
                    }
                },
                t(key) {
                    try {
                        let translation = this.translations[this.currentLang][key] || key;
                        return translation.replace(/_/g, ' ');
                    } catch (e) {
                        return key.replace(/_/g, ' ');
                    }
                },
                setLanguage(code) {
                    this.currentLang = code;
                    localStorage.setItem('selectedLang', code);
                    window.dispatchEvent(new CustomEvent('language-changed', { detail: code }));
                },
                getFlagUrl(code) {
                    const map = { id: 'id', en: 'gb', jp: 'jp', kr: 'kr', cn: 'cn' };
                    return `https://flagcdn.com/w20/${map[code]}.png`;
                }
            }));
        });
    </script>
</body>

</html>