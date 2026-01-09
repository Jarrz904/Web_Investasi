@extends('layouts.app')

@section('content')
<div class="bg-white min-h-screen" x-data="{ 
    content: {
        id: {
            title: 'PROFIL WILAYAH',
            subtitle: 'KABUPATEN TEGAL',
            desc: 'Kabupaten Tegal terletak di bagian utara Provinsi Jawa Tengah dengan letak geografis yang strategis di jalur pantura. Memiliki luas wilayah sebesar 878,79 km², wilayah ini terbagi menjadi dataran rendah di utara dan dataran tinggi di selatan (lereng Gunung Slamet).',
            label_luas: 'Luas Wilayah',
            label_kec: 'Jumlah Kecamatan',
            val_kec: '18 Kecamatan',
            fakta_title: 'FAKTA & ANGKA',
            fakta_sub: 'Mengenal Kabupaten Tegal dalam Data',
            stat_penduduk: '1.6 Juta+',
            label_penduduk: 'Total Penduduk',
            stat_investasi: '12.5 T',
            label_investasi: 'Realisasi Investasi',
            galeri_title: 'GALERI TEGAL',
            testi_title: 'TESTIMONI',
            testi_sub: 'Pendapat Para Investor & Pengusaha',
            testi_1: 'Kabupaten Tegal memiliki infrastruktur yang sangat mendukung untuk industri manufaktur.',
            testi_2: 'Proses perizinan di DPMPTSP sangat cepat dan transparan. Luar biasa!',
            label_btn_detail: 'Pelajari Lebih Lanjut',
            label_btn_kontak: 'Hubungi Kami'
        },
        en: {
            title: 'REGION PROFILE',
            subtitle: 'TEGAL REGENCY',
            desc: 'Tegal Regency is located in the northern part of Central Java Province with a strategic geographical position on the northern coast (Pantura) route. Covering an area of 878.79 km², this region is divided into lowlands in the north and highlands in the south.',
            label_luas: 'Total Area',
            label_kec: 'Number of Districts',
            val_kec: '18 Districts',
            fakta_title: 'FACTS & FIGURES',
            fakta_sub: 'Getting to Know Tegal Regency in Data',
            stat_penduduk: '1.6 Million+',
            label_penduduk: 'Total Population',
            stat_investasi: '$850M+',
            label_investasi: 'Investment Realization',
            galeri_title: 'TEGAL GALLERY',
            testi_title: 'TESTIMONIALS',
            testi_sub: 'What Investors & Entrepreneurs Say',
            testi_1: 'Tegal Regency has very supportive infrastructure for the manufacturing industry.',
            testi_2: 'The licensing process at DPMPTSP is very fast and transparent. Excellent!',
            label_btn_detail: 'Learn More',
            label_btn_kontak: 'Contact Us'
        },
        jp: {
            title: '地域プロフィール',
            subtitle: 'テガル県',
            desc: 'テガル県は中部ジャワ州の北部に位置し、パンチュラ（北海岸）ルート上の戦略的な地理的位置にあります。面積は878.79km²で、北部の低地と南部の高地に分かれています。',
            label_luas: '総面積',
            label_kec: '郡の数',
            val_kec: '18郡',
            fakta_title: '事実と数字',
            fakta_sub: 'データで見るテガル県',
            stat_penduduk: '160万人+',
            label_penduduk: '総人口',
            stat_investasi: '12.5 兆',
            label_investasi: '投資実績',
            galeri_title: 'ギャラリー',
            testi_title: 'お客様の声',
            testi_sub: '投資家と起業家の意見',
            testi_1: 'テガル県は製造業にとって非常に強力なインフラを備えています。',
            testi_2: 'DPMPTSPのライセンスプロセスは非常に迅速で透明性があります。素晴らしい！',
            label_btn_detail: 'もっと詳しく',
            label_btn_kontak: 'お問い合わせ'
        },
        kr: {
            title: '지역 프로필',
            subtitle: '테갈 리젠시',
            desc: '테갈 리젠시는 중부 자바 주의 북부에 위치하고 있으며 판투라(북부 해안) 경로의 전략적 지리적 위치에 있습니다. 878.79km²의 면적을 가지고 있습니다.',
            label_luas: '총 면적',
            label_kec: '군 수',
            val_kec: '18개 군',
            fakta_title: '팩트 및 수치',
            fakta_sub: '데이터로 보는 테갈 리젠시',
            stat_penduduk: '160만+',
            label_penduduk: '총 인구',
            stat_investasi: '12.5 조',
            label_investasi: '투자 실현',
            galeri_title: '갤러리',
            testi_title: '추천사',
            testi_sub: '투자자 및 기업가의 의견',
            testi_1: '테갈 리젠시는 제조업을 위한 매우 지원적인 인フラ를 갖추고 있습니다.',
            testi_2: 'DPMPTSP의 라이선스 프로세스는 매우 빠르고 투명합니다. 탁월합니다!',
            label_btn_detail: '더 알아보기',
            label_btn_kontak: '문의하기'
        },
        cn: {
            title: '地区概况',
            subtitle: '德加尔县',
            desc: '德加尔县位于中爪哇省北部，地理位置优越，处于北海岸（Pantura）航线上。 面积为 878.79 平方公里。',
            label_luas: '总面积',
            label_kec: '区数量',
            val_kec: '18个区',
            fakta_title: '事实与数据',
            fakta_sub: '通过数据了解德加尔县',
            stat_penduduk: '160万+',
            label_penduduk: '总人口',
            stat_investasi: '12.5 兆',
            label_investasi: '投资实现',
            galeri_title: '展厅',
            testi_title: '证言',
            testi_sub: '投资者与企业家的看法',
            testi_1: '德加尔县拥有非常支持制造业的基础设施。',
            testi_2: 'DPMPTSP 的许可过程非常快速且透明。优秀！',
            label_btn_detail: '了解更多',
            label_btn_kontak: '联系我们'
        }
    }
}">

   <section class="relative h-[60vh] md:h-[70vh] flex items-center justify-center overflow-hidden">
    <img src="{{ asset('images/background.jpeg') }}" 
         class="absolute inset-0 w-full h-full object-cover" alt="Tegal Background">
    
    <div class="absolute inset-0 bg-black/60 z-10"></div>

    <div class="container mx-auto px-6 relative z-20 text-center">
        <div class="max-w-4xl mx-auto" data-aos="fade-up" data-aos-duration="1000">
            
            <p class="text-amber-400 font-bold tracking-[0.2em] uppercase text-xs md:text-sm mb-4 drop-shadow-md" 
               x-text="currentLang === 'id' ? 'Potensi & Peluang Investasi' : 'Investment Potential & Opportunities'">
                Potensi & Peluang Investasi
            </p>

            <h1 class="text-white text-3xl md:text-6xl font-extrabold leading-[1.1] mb-6 drop-shadow-2xl">
                <span class="block opacity-90 font-medium text-2xl md:text-4xl mb-2" 
                      x-text="currentLang === 'id' ? 'Selamat Datang di' : content[currentLang].title">
                    Selamat Datang di
                </span>
                <span class="text-white tracking-tight uppercase" x-text="content[currentLang].subtitle">
                    KABUPATEN TEGAL
                </span>
            </h1>

            <div class="max-w-2xl mx-auto mb-10">
                <p class="text-white/80 text-sm md:text-base lg:text-lg leading-relaxed font-normal" 
                   x-text="content[currentLang].desc">
                    Kabupaten Tegal merupakan salah satu kabupaten di Jawa Tengah yang memiliki potensi besar dalam berbagai sektor. Dengan letak strategis dan sumber daya yang melimpah, Tegal siap menjadi destinasi investasi terbaik.
                </p>
            </div>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="#tentang" 
                   class="w-full sm:w-auto px-10 py-3.5 bg-white text-gray-900 rounded-full font-bold text-xs md:text-sm uppercase tracking-widest hover:bg-amber-500 hover:text-white transition-all duration-300 shadow-xl hover:-translate-y-1">
                    <span x-text="content[currentLang].label_btn_detail">Pelajari Lebih Lanjut</span>
                </a>

                <a href="{{ route('kontak.index') }}" 
                   class="w-full sm:w-auto px-10 py-3.5 bg-transparent border-2 border-white/50 text-white rounded-full font-bold text-xs md:text-sm uppercase tracking-widest hover:bg-white hover:text-gray-900 transition-all duration-300 hover:border-white">
                    <span x-text="content[currentLang].label_btn_kontak">Hubungi Kami</span>
                </a>
            </div>
        </div>
    </div>
</section>

    <section class="py-20 bg-white">
        <div class="container mx-auto px-4 md:px-20 text-center">
            <h2 class="text-xs font-black text-amber-600 tracking-[0.3em] uppercase mb-2" x-text="content[currentLang].fakta_title">FAKTA & ANGKA</h2>
            <h3 class="text-3xl md:text-4xl font-black text-gray-900 mb-16" x-text="content[currentLang].fakta_sub">Mengenal Kabupaten Tegal dalam Data</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="p-8 bg-gray-50 rounded-[2rem] hover:bg-amber-50 transition duration-500 group">
                    <div class="text-4xl font-black text-gray-900 mb-2 group-hover:text-amber-600 transition" x-text="content[currentLang].stat_penduduk">1.6 Juta+</div>
                    <div class="text-xs font-bold text-gray-400 uppercase tracking-widest" x-text="content[currentLang].label_penduduk">Total Penduduk</div>
                </div>
                <div class="p-8 bg-gray-50 rounded-[2rem] hover:bg-amber-50 transition duration-500 group">
                    <div class="text-4xl font-black text-gray-900 mb-2 group-hover:text-amber-600 transition">878,79</div>
                    <div class="text-xs font-bold text-gray-400 uppercase tracking-widest" x-text="content[currentLang].label_luas">Luas Wilayah (Km²)</div>
                </div>
                <div class="p-8 bg-gray-50 rounded-[2rem] hover:bg-amber-50 transition duration-500 group">
                    <div class="text-4xl font-black text-gray-900 mb-2 group-hover:text-amber-600 transition" x-text="content[currentLang].val_kec">18</div>
                    <div class="text-xs font-bold text-gray-400 uppercase tracking-widest" x-text="content[currentLang].label_kec">Kecamatan</div>
                </div>
                <div class="p-8 bg-gray-50 rounded-[2rem] hover:bg-amber-50 transition duration-500 group">
                    <div class="text-4xl font-black text-gray-900 mb-2 group-hover:text-amber-600 transition" x-text="content[currentLang].stat_investasi">12.5 T</div>
                    <div class="text-xs font-bold text-gray-400 uppercase tracking-widest" x-text="content[currentLang].label_investasi">Realisasi Investasi</div>
                </div>
            </div>
        </div>
    </section>

    <section id="tentang" class="py-24 bg-gray-50 scroll-mt-20">
        <div class="container mx-auto px-4 md:px-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
                <div class="relative">
                    <div class="absolute -top-10 -left-10 w-40 h-40 bg-amber-200 rounded-full blur-3xl opacity-30"></div>
                    <img src="{{ asset('images/background.jpeg') }}" 
                         class="rounded-[3rem] shadow-2xl relative z-10" alt="About Tegal">
                </div>
                <div>
                    <h2 class="text-4xl font-black text-gray-900 mb-6" x-text="content[currentLang].subtitle">TENTANG KABUPATEN TEGAL</h2>
                    <p class="text-gray-500 text-lg leading-relaxed mb-8" x-text="content[currentLang].desc"></p>
                    <a href="#" class="inline-flex items-center gap-3 bg-amber-600 text-white px-8 py-4 rounded-2xl font-bold uppercase text-xs tracking-widest hover:bg-gray-900 transition shadow-lg shadow-amber-200">
                        Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white">
        <div class="container mx-auto px-4 md:px-20">
            <div class="text-center mb-16">
                <h2 class="text-xs font-black text-amber-600 tracking-[0.3em] uppercase mb-2" x-text="content[currentLang].galeri_title">GALERI TEGAL</h2>
                <div class="h-1 w-20 bg-amber-500 mx-auto mt-4"></div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=400" class="h-64 w-full object-cover rounded-3xl hover:opacity-80 transition cursor-pointer">
                <img src="https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=400" class="h-64 w-full object-cover rounded-3xl hover:opacity-80 transition cursor-pointer">
                <img src="https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?auto=format&fit=crop&w=400" class="h-64 w-full object-cover rounded-3xl hover:opacity-80 transition cursor-pointer">
                <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?auto=format&fit=crop&w=400" class="h-64 w-full object-cover rounded-3xl hover:opacity-80 transition cursor-pointer">
            </div>
        </div>
    </section>

    <section class="py-24 bg-gray-900 text-white overflow-hidden relative">
        <div class="absolute top-0 right-0 w-96 h-96 bg-amber-500/10 rounded-full blur-3xl"></div>
        <div class="container mx-auto px-4 md:px-20 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-xs font-black text-amber-500 tracking-[0.3em] uppercase mb-2" x-text="content[currentLang].testi_title">TESTIMONI</h2>
                <h3 class="text-3xl font-black" x-text="content[currentLang].testi_sub">Pendapat Para Investor</h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white/5 p-10 rounded-[2.5rem] border border-white/10 backdrop-blur-sm">
                    <i class="fas fa-quote-left text-3xl text-amber-500 mb-6"></i>
                    <p class="text-lg italic mb-8 opacity-80" x-text="content[currentLang].testi_1">"Kabupaten Tegal memiliki infrastruktur yang sangat mendukung."</p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-amber-500 rounded-full"></div>
                        <div>
                            <p class="font-bold">John Doe</p>
                            <p class="text-xs opacity-50">CEO Tech Manufacturing</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white/5 p-10 rounded-[2.5rem] border border-white/10 backdrop-blur-sm">
                    <i class="fas fa-quote-left text-3xl text-amber-500 mb-6"></i>
                    <p class="text-lg italic mb-8 opacity-80" x-text="content[currentLang].testi_2">"Proses perizinan di DPMPTSP sangat cepat."</p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-blue-500 rounded-full"></div>
                        <div>
                            <p class="font-bold">Budi Santoso</p>
                            <p class="text-xs opacity-50">Direktur PT. Maju Bersama</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-gray-50">
        <div class="container mx-auto px-4 md:px-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div class="space-y-8">
                    <h2 class="text-4xl font-black text-gray-900" x-text="t('hubungi_kami')">Hubungi Kami</h2>
                    <div class="space-y-6">
                        <div class="flex items-center gap-5">
                            <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center shadow-sm text-amber-600"><i class="fas fa-envelope"></i></div>
                            <p class="font-bold text-gray-800">pmptsp@tegalkab.go.id</p>
                        </div>
                        <div class="flex items-center gap-5">
                            <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center shadow-sm text-amber-600"><i class="fas fa-phone"></i></div>
                            <p class="font-bold text-gray-800">+62 283 491827</p>
                        </div>
                        <div class="flex items-center gap-5">
                            <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center shadow-sm text-amber-600"><i class="fas fa-map-marker-alt"></i></div>
                            <p class="font-bold text-gray-800 leading-tight">Jl. Dr. Soetomo No. 1, Slawi</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-10 rounded-[2.5rem] shadow-xl border border-gray-100">
                    <form action="#" class="space-y-5">
                        <input type="text" placeholder="Nama Lengkap" class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500 outline-none">
                        <input type="email" placeholder="Email" class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500 outline-none">
                        <textarea rows="4" placeholder="Pesan Anda" class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500 outline-none"></textarea>
                        <button class="w-full bg-gray-900 text-white py-5 rounded-2xl font-black uppercase tracking-widest hover:bg-amber-600 transition">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    /* Haluskan gulir saat klik link jangkar */
    html {
        scroll-behavior: smooth;
    }
    .text-shadow { text-shadow: 1px 1px 2px rgba(0,0,0,0.1); }
    input::placeholder, textarea::placeholder { color: #A0AEC0; }
    
    /* Mencegah section tertutup navbar jika ada sticky header */
    .scroll-mt-20 {
        scroll-margin-top: 5rem;
    }
</style>
@endsection