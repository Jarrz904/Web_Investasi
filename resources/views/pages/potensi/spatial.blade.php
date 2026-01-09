@extends('layouts.app')

@section('content')
<style>
    /* Optimasi Kontras & Visual */
    .text-shadow-heavy { text-shadow: 0 4px 12px rgba(0,0,0,0.6); }
    .hero-gradient { background: linear-gradient(to bottom, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.3) 100%); }
    
    /* Ukuran section yang lebih proporsional */
    .section-spacing { padding-top: 3.5rem; padding-bottom: 3.5rem; }
    @media (min-width: 768px) {
        .section-spacing { padding-top: 5rem; padding-bottom: 5rem; }
    }
    [x-cloak] { display: none !important; }

    /* Custom Scrollbar for better UX */
    ::-webkit-scrollbar { width: 8px; }
    ::-webkit-scrollbar-track { background: #f1f1f1; }
    ::-webkit-scrollbar-thumb { background: #fbbf24; border-radius: 10px; }
</style>

<div class="relative w-full" 
     x-data="{ 
        lang: localStorage.getItem('selectedLang') || 'id',
        content: {
            id: {
                hero_t1: 'Akselerasi', hero_t2: 'Ekonomi Lokal', hero_desc: 'Mendorong inovasi produk UMKM Tegal untuk mendominasi pasar nasional dan menembus rantai pasok global.', hero_btn: 'Jelajahi Sektor Unggulan',
                stat_umkm: 'UMKM Terdaftar', stat_kec: 'Kecamatan', stat_eks: 'Produk Ekspor', stat_sentra: 'Sentra Industri',
                visi_sub: 'Visi Pemberdayaan', visi_title: 'Kemandirian Kreatif 2026', visi_desc: 'Kami membangun fondasi ekonomi yang kuat melalui digitalisasi, standarisasi produk internasional, dan akses permodalan yang terjangkau bagi seluruh pelaku usaha.',
                check1: 'Pendampingan Sertifikasi Global', check2: 'Transformasi Digital Terpadu',
                sektor_sub: 'Pilar Ekonomi', sektor_title: 'Sektor Unggulan',
                s1_t: 'Logam & Mesin', s1_d: 'Komponen otomotif dan alat pertanian berkualitas nasional.',
                s2_t: 'Konveksi', s2_d: 'Produksi tekstil skala besar dengan kualitas retail internasional.',
                s3_t: 'Pangan Olahan', s3_d: 'Inovasi kuliner khas Tegal dengan standarisasi BPOM & Halal.',
                s4_t: 'Batik Tegalan', s4_d: 'Warisan budaya agung dengan sentuhan motif modern kontemporer.',
                s5_t: 'Furniture Jati', s5_d: 'Kerajinan kayu premium untuk pasar ekspor dan domestik.',
                s6_t: 'Agro-Industri', s6_d: 'Pengolahan teh, melati, dan bawang merah hasil bumi unggulan.',
                map_sub: 'Kemitraan', map_title: 'Akses Strategis Pantura', map_desc: 'Terletak di jalur logistik utama Jawa, mempermudah distribusi produk ke seluruh penjuru Nusantara.'
            },
            en: {
                hero_t1: 'Accelerate', hero_t2: 'Local Economy', hero_desc: 'Driving Tegal MSME product innovation to dominate national markets and penetrate global supply chains.', hero_btn: 'Explore Leading Sectors',
                stat_umkm: 'Registered MSMEs', stat_kec: 'Districts', stat_eks: 'Export Products', stat_sentra: 'Industrial Centers',
                visi_sub: 'Empowerment Vision', visi_title: 'Creative Independence 2026', visi_desc: 'We build a strong economic foundation through digitalization, international product standardization, and affordable capital access.',
                check1: 'Global Certification Assistance', check2: 'Integrated Digital Transformation',
                sektor_sub: 'Economic Pillars', sektor_title: 'Leading Sectors',
                s1_t: 'Metal & Machinery', s1_d: 'Automotive components and national quality agricultural tools.',
                s2_t: 'Convection', s2_d: 'Large-scale textile production with international retail quality.',
                s3_t: 'Processed Food', s3_d: 'Tegal culinary innovation with BPOM & Halal standardization.',
                s4_t: 'Tegal Batik', s4_d: 'Noble cultural heritage with modern contemporary motifs.',
                s5_t: 'Teak Furniture', s5_d: 'Premium wood crafts for export and domestic markets.',
                s6_t: 'Agro-Industry', s6_d: 'Processing of tea, jasmine, and shallots as superior products.',
                map_sub: 'Partnership', map_title: 'Strategic Pantura Access', map_desc: 'Located on Javas main logistics route, facilitating distribution across the archipelago.'
            },
            jp: {
                hero_t1: '加速する', hero_t2: '地域経済', hero_desc: 'テガルの中小企業の製品イノベーションを推進し、国内市場を支配し、グローバルサプライチェーンに浸透させます。', hero_btn: '主要セクターを探索する',
                stat_umkm: '登録済み中小企業', stat_kec: '地区', stat_eks: '輸出製品', stat_sentra: '産業センター',
                visi_sub: 'エンパワーメントビジョン', visi_title: 'クリエイティブな自立 2026', visi_desc: 'デジタルトランスフォーメーション、国際的な製品標準化、手頃な価格の資金提供を通じて、強力な経済基盤を構築します。',
                check1: 'グローバル認証支援', check2: '統合デジタルトランスフォーメーション',
                sektor_sub: '経済の柱', sektor_title: '主要セクター',
                s1_t: '金属と機械', s1_d: '自動車部品および国家品質の農業用工具。',
                s2_t: '既製服', s2_d: '国際的な小売品質を備えた大規模な繊維生産。',
                s3_t: '加工食品', s3_d: 'BPOMおよびハラール標準化によるテガルの料理革新。',
                s4_t: 'テガル・バティック', s4_d: '現代的なモチーフを取り入れた高貴な文化遺産。',
                s5_t: 'チーク家具', s5_d: '輸出および国内市場向けのプレミアム木工品。',
                s6_t: '農業産業', s6_d: '茶、ジャスミン、エシャロットの加工。',
                map_sub: 'パートナーシップ', map_title: '戦略的なパントゥラアクセス', map_desc: 'ジャワの主要な物流ルートに位置し、インドネシア全土への配送を容易にします。'
            },
            kr: {
                hero_t1: '가속화', hero_t2: '지역 경제', hero_desc: '테갈 중소기업의 제품 혁신을 촉진하여 국내 시장을 점유하고 글로벌 공급망에 진출합니다.', hero_btn: '주요 부문 탐색',
                stat_umkm: '등록된 중소기업', stat_kec: '행정구역', stat_eks: '수출 제품', stat_sentra: '산업 단지',
                visi_sub: '권한 부여 비전', visi_title: '창의적 자립 2026', visi_desc: '디지털화, 국제 제품 표준화 및 저렴한 자본 접근성을 통해 강력한 경제 기반을 구축합니다.',
                check1: '글로벌 인증 지원', check2: '통합 디지털 전환',
                sektor_sub: '경제적 지주', sektor_title: '주요 부문',
                s1_t: '금속 및 기계', s1_d: '자동차 부품 및 국가 품질의 농기구.',
                s2_t: '봉제업', s2_d: '국제적인 소매 품질의 대규모 섬유 생산.',
                s3_t: '가공 식품', s3_d: 'BPOM 및 할랄 표준화를 통한 테갈 요리 혁신.',
                s4_t: '테갈 바틱', s4_d: '현대적인 모티프가 가미된 숭고한 문화 유산.',
                s5_t: '티크 가구', s5_d: '수출 및 내수 시장을 위한 프리미엄 목공예품.',
                s6_t: '농산업', s6_d: '차, 자스민, 샬롯 등의 우수 농산물 가공.',
                map_sub: '파트너십', map_title: '전략적 판투라 접근성', map_desc: '자바의 주요 물류 경로에 위치하여 전국 각지로의 유통이 용이합니다.'
            },
            cn: {
                hero_t1: '加速', hero_t2: '地方经济', hero_desc: '推动德加尔中小微企业产品创新，占领国内市场并渗透全球供应链。', hero_btn: '探索领先部门',
                stat_umkm: '注册中小微企业', stat_kec: '区县', stat_eks: '出口产品', stat_sentra: '工业中心',
                visi_sub: '赋能愿景', visi_title: '创意自主 2026', visi_desc: '我们通过数字化、国际产品标准化和负担得起的资金渠道，建立强大的经济基础。',
                check1: '全球认证辅导', check2: '综合数字化转型',
                sektor_sub: '经济支柱', sektor_title: '领先部门',
                s1_t: '金属与机械', s1_d: '汽车零部件和国家级质量的农具。',
                s2_t: '成衣', s2_d: '具有国际零售质量的大规模纺织品生产。',
                s3_t: '加工食品', s3_d: '德加尔烹饪创新，符合BPOM和清真标准化。',
                s4_t: '德加尔蜡染', s4_d: '融合现代当代图案的高贵文化遗产。',
                s5_t: '柚木家具', s5_d: '面向出口和国内市场的优质木工艺品。',
                s6_t: '农业产业', s6_d: '茶叶、茉莉和红葱头的深加工。',
                map_sub: '合作伙伴', map_title: '战略性横贯公路通道', map_desc: '位于爪哇岛主要物流路线上，方便向全国各地分销产品。'
            }
        }
     }"
     @language-changed.window="lang = $event.detail">
    
    <section class="relative h-[55vh] md:h-[65vh] flex items-center justify-center overflow-hidden bg-center bg-cover" 
             style="background-image: url('https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=2070&auto=format&fit=crop');">
        
        <div class="absolute inset-0 hero-gradient backdrop-blur-[1px]"></div>

        <div class="container mx-auto px-6 relative z-10 text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-black mb-3 tracking-tighter uppercase leading-tight text-white text-shadow-heavy">
                <span x-text="content[lang].hero_t1"></span> <br>
                <span class="text-amber-400" x-text="content[lang].hero_t2"></span>
            </h1>
            
            <p class="text-base md:text-lg text-white max-w-xl mx-auto leading-relaxed font-bold mb-6 text-shadow-heavy opacity-90"
               x-text="content[lang].hero_desc"></p>

            <div class="flex justify-center">
                <a href="#sektor" class="bg-amber-500 text-white px-8 py-3 rounded-full font-black uppercase tracking-widest text-[10px] md:text-xs hover:bg-white hover:text-amber-600 transition-all shadow-2xl transform hover:-translate-y-1"
                   x-text="content[lang].hero_btn"></a>
            </div>
        </div>
    </section>

    <section class="container mx-auto px-6 -mt-10 relative z-30">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 md:gap-5">
            <div class="bg-white p-4 md:p-6 rounded-[1.2rem] md:rounded-[1.5rem] shadow-xl border-b-4 border-amber-500 transform transition duration-500 hover:scale-105 text-center">
                <i class="fas fa-store text-amber-500 mb-2 text-lg"></i>
                <span class="block text-xl md:text-3xl font-black text-gray-900 mb-0">5.240+</span>
                <span class="text-[9px] font-black text-gray-400 uppercase tracking-wider" x-text="content[lang].stat_umkm"></span>
            </div>
            <div class="bg-white p-4 md:p-6 rounded-[1.2rem] md:rounded-[1.5rem] shadow-xl border-b-4 border-amber-500 transform transition duration-500 hover:scale-105 text-center">
                <i class="fas fa-map-location-dot text-amber-500 mb-2 text-lg"></i>
                <span class="block text-xl md:text-3xl font-black text-gray-900 mb-0">18</span>
                <span class="text-[9px] font-black text-gray-400 uppercase tracking-wider" x-text="content[lang].stat_kec"></span>
            </div>
            <div class="bg-white p-4 md:p-6 rounded-[1.2rem] md:rounded-[1.5rem] shadow-xl border-b-4 border-amber-500 transform transition duration-500 hover:scale-105 text-center">
                <i class="fas fa-globe text-amber-500 mb-2 text-lg"></i>
                <span class="block text-xl md:text-3xl font-black text-gray-900 mb-0">120+</span>
                <span class="text-[9px] font-black text-gray-400 uppercase tracking-wider" x-text="content[lang].stat_eks"></span>
            </div>
            <div class="bg-white p-4 md:p-6 rounded-[1.2rem] md:rounded-[1.5rem] shadow-xl border-b-4 border-amber-500 transform transition duration-500 hover:scale-105 text-center">
                <i class="fas fa-warehouse text-amber-500 mb-2 text-lg"></i>
                <span class="block text-xl md:text-3xl font-black text-gray-900 mb-0">25</span>
                <span class="text-[9px] font-black text-gray-400 uppercase tracking-wider" x-text="content[lang].stat_sentra"></span>
            </div>
        </div>
    </section>

    <section class="section-spacing bg-white">
        <div class="container mx-auto px-6 md:px-10">
            <div class="flex flex-col md:flex-row items-center gap-8 lg:gap-16">
                <div class="md:w-1/2">
                    <h4 class="text-amber-600 font-black tracking-widest text-xs mb-2 uppercase italic" x-text="content[lang].visi_sub"></h4>
                    <h2 class="text-3xl md:text-4xl font-black text-gray-900 mb-4 uppercase tracking-tighter leading-tight" x-text="content[lang].visi_title"></h2>
                    <p class="text-gray-600 leading-relaxed mb-6 text-base font-medium" x-text="content[lang].visi_desc"></p>
                    
                    <ul class="space-y-2">
                        <li class="flex items-center gap-3 font-bold text-gray-800 text-sm">
                            <span class="w-5 h-5 bg-amber-100 text-amber-600 rounded-md flex items-center justify-center text-[10px]"><i class="fas fa-check"></i></span>
                            <span x-text="content[lang].check1"></span>
                        </li>
                        <li class="flex items-center gap-3 font-bold text-gray-800 text-sm">
                            <span class="w-5 h-5 bg-amber-100 text-amber-600 rounded-md flex items-center justify-center text-[10px]"><i class="fas fa-check"></i></span>
                            <span x-text="content[lang].check2"></span>
                        </li>
                    </ul>
                </div>
                <div class="md:w-1/2">
                    <img src="https://images.unsplash.com/photo-1556761175-b413da4baf72?q=80&w=2074&auto=format&fit=crop" class="rounded-[1.5rem] md:rounded-[2.5rem] shadow-2xl grayscale hover:grayscale-0 transition-all duration-700 w-full" alt="UMKM Digital">
                </div>
            </div>
        </div>
    </section>

    <section id="sektor" class="section-spacing bg-gray-50 rounded-[2rem] md:rounded-[3rem] mx-4 md:mx-10 mb-8">
        <div class="container mx-auto px-6">
            <div class="text-center mb-10 md:mb-14">
                <h4 class="text-amber-600 font-black tracking-[0.3em] text-[9px] mb-1 uppercase italic" x-text="content[lang].sektor_sub"></h4>
                <h2 class="text-3xl md:text-5xl font-black text-gray-900 uppercase tracking-tighter" x-text="content[lang].sektor_title"></h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                <div class="group bg-white p-6 md:p-8 rounded-[1.5rem] md:rounded-[2rem] shadow-sm hover:shadow-xl hover:bg-amber-500 transition-all duration-500 transform hover:-translate-y-1">
                    <div class="w-12 h-12 bg-amber-50 rounded-xl flex items-center justify-center mb-4 group-hover:bg-white transition-all">
                        <i class="fas fa-hammer text-xl text-amber-600"></i>
                    </div>
                    <h3 class="text-lg md:text-xl font-black text-gray-900 group-hover:text-white mb-2 uppercase tracking-tight" x-text="content[lang].s1_t"></h3>
                    <p class="text-xs md:text-sm text-gray-500 group-hover:text-amber-50 font-bold leading-relaxed opacity-90" x-text="content[lang].s1_d"></p>
                </div>
                
                <div class="group bg-white p-6 md:p-8 rounded-[1.5rem] md:rounded-[2rem] shadow-sm hover:shadow-xl hover:bg-amber-500 transition-all duration-500 transform hover:-translate-y-1">
                    <div class="w-12 h-12 bg-amber-50 rounded-xl flex items-center justify-center mb-4 group-hover:bg-white transition-all">
                        <i class="fas fa-shirt text-xl text-amber-600"></i>
                    </div>
                    <h3 class="text-lg md:text-xl font-black text-gray-900 group-hover:text-white mb-2 uppercase tracking-tight" x-text="content[lang].s2_t"></h3>
                    <p class="text-xs md:text-sm text-gray-500 group-hover:text-amber-50 font-bold leading-relaxed opacity-90" x-text="content[lang].s2_d"></p>
                </div>

                <div class="group bg-white p-6 md:p-8 rounded-[1.5rem] md:rounded-[2rem] shadow-sm hover:shadow-xl hover:bg-amber-500 transition-all duration-500 transform hover:-translate-y-1">
                    <div class="w-12 h-12 bg-amber-50 rounded-xl flex items-center justify-center mb-4 group-hover:bg-white transition-all">
                        <i class="fas fa-utensils text-xl text-amber-600"></i>
                    </div>
                    <h3 class="text-lg md:text-xl font-black text-gray-900 group-hover:text-white mb-2 uppercase tracking-tight" x-text="content[lang].s3_t"></h3>
                    <p class="text-xs md:text-sm text-gray-500 group-hover:text-amber-50 font-bold leading-relaxed opacity-90" x-text="content[lang].s3_d"></p>
                </div>

                <div class="group bg-white p-6 md:p-8 rounded-[1.5rem] md:rounded-[2rem] shadow-sm hover:shadow-xl hover:bg-amber-500 transition-all duration-500 transform hover:-translate-y-1">
                    <div class="w-12 h-12 bg-amber-50 rounded-xl flex items-center justify-center mb-4 group-hover:bg-white transition-all">
                        <i class="fas fa-palette text-xl text-amber-600"></i>
                    </div>
                    <h3 class="text-lg md:text-xl font-black text-gray-900 group-hover:text-white mb-2 uppercase tracking-tight" x-text="content[lang].s4_t"></h3>
                    <p class="text-xs md:text-sm text-gray-500 group-hover:text-amber-50 font-bold leading-relaxed opacity-90" x-text="content[lang].s4_d"></p>
                </div>

                <div class="group bg-white p-6 md:p-8 rounded-[1.5rem] md:rounded-[2rem] shadow-sm hover:shadow-xl hover:bg-amber-500 transition-all duration-500 transform hover:-translate-y-1">
                    <div class="w-12 h-12 bg-amber-50 rounded-xl flex items-center justify-center mb-4 group-hover:bg-white transition-all">
                        <i class="fas fa-tree text-xl text-amber-600"></i>
                    </div>
                    <h3 class="text-lg md:text-xl font-black text-gray-900 group-hover:text-white mb-2 uppercase tracking-tight" x-text="content[lang].s5_t"></h3>
                    <p class="text-xs md:text-sm text-gray-500 group-hover:text-amber-50 font-bold leading-relaxed opacity-90" x-text="content[lang].s5_d"></p>
                </div>

                <div class="group bg-white p-6 md:p-8 rounded-[1.5rem] md:rounded-[2rem] shadow-sm hover:shadow-xl hover:bg-amber-500 transition-all duration-500 transform hover:-translate-y-1">
                    <div class="w-12 h-12 bg-amber-50 rounded-xl flex items-center justify-center mb-4 group-hover:bg-white transition-all">
                        <i class="fas fa-leaf text-xl text-amber-600"></i>
                    </div>
                    <h3 class="text-lg md:text-xl font-black text-gray-900 group-hover:text-white mb-2 uppercase tracking-tight" x-text="content[lang].s6_t"></h3>
                    <p class="text-xs md:text-sm text-gray-500 group-hover:text-amber-50 font-bold leading-relaxed opacity-90" x-text="content[lang].s6_d"></p>
                </div>
            </div>
        </div>
    </section>

    <section id="kontak" class="section-spacing bg-white">
        <div class="container mx-auto px-6 md:px-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div class="rounded-[1.5rem] md:rounded-[2.5rem] overflow-hidden shadow-2xl grayscale hover:grayscale-0 transition-all duration-700 border-4 border-gray-50">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126715.36294503756!2d109.117174!3d-6.914744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fbe147072a275%3A0x3027a7635292430!2sKabupaten%20Tegal%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
                            width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div>
                    <h4 class="text-amber-600 font-black tracking-widest text-xs mb-2 uppercase italic" x-text="content[lang].map_sub"></h4>
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-black text-gray-900 mb-4 uppercase tracking-tighter leading-none" x-text="content[lang].map_title"></h2>
                    <p class="text-gray-600 text-base mb-6 leading-relaxed font-medium" x-text="content[lang].map_desc"></p>
                    
                    <div class="space-y-3">
                        <div class="flex items-center gap-4 p-2 rounded-xl hover:bg-amber-50 transition-colors group">
                            <div class="w-10 h-10 bg-gray-900 text-white rounded-lg flex items-center justify-center text-sm group-hover:bg-amber-500 transition-all shadow-md">
                                <i class="fas fa-location-dot"></i>
                            </div>
                            <span class="text-gray-800 text-sm md:text-base font-black uppercase tracking-tighter italic">Pemerintah Kabupaten Tegal</span>
                        </div>
                        <div class="flex items-center gap-4 p-2 rounded-xl hover:bg-amber-50 transition-colors group">
                            <div class="w-10 h-10 bg-gray-900 text-white rounded-lg flex items-center justify-center text-sm group-hover:bg-amber-500 transition-all shadow-md">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <span class="text-gray-800 text-sm md:text-base font-black tracking-tighter italic lowercase">pmptsp@tegalkab.go.id</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection