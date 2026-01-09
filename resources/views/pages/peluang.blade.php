@extends('layouts.app')

@section('content')
<div class="bg-white min-h-screen" x-data="{ 
    content: {
        id: {
            title: 'Peluang Investasi Strategis',
            subtitle: 'Temukan berbagai potensi proyek unggulan di Kabupaten Tegal yang siap untuk dikembangkan bersama mitra strategis.',
            pilih_kecamatan: 'Pilih Kecamatan',
            pilih_sektor: 'Pilih Sektor',
            kata_kunci: 'Kata Kunci',
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
            title: 'Strategic Investment Opportunities',
            subtitle: 'Discover various flagship project potentials in Tegal Regency ready for development with strategic partners.',
            pilih_kecamatan: 'Select District',
            pilih_sektor: 'Select Sector',
            kata_kunci: 'Keyword',
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
            title: '戦略的投資機会',
            subtitle: 'テガル県における戦略的パートナーとの開発に向けた、主要プロジェクトの可能性を発見してください。',
            pilih_kecamatan: '地区を選択',
            pilih_sektor: 'セクターを選択',
            kata_kunci: 'キーワード',
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
            title: '전략적 투자 기회',
            subtitle: '전략적 파트너와 함께 개발할 준비가 된 테갈 군(Tegal Regency)의 다양한 주요 프로젝트 잠재력을 발견하십시오.',
            pilih_kecamatan: '지역 선택',
            pilih_sektor: '분야 선택',
            kata_kunci: '키워드',
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
            title: '战略投资机会',
            subtitle: '发掘德加尔县（Tegal Regency）准备与战略合作伙伴共同开发的各项重点项目潜力。',
            pilih_kecamatan: '选择地区',
            pilih_sektor: '选择部门',
            kata_kunci: '关键词',
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
    }
}">

   <section class="relative h-screen flex items-center justify-center overflow-hidden snap-start">
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/background.jpeg') }}" 
             class="w-full h-full object-cover" 
             alt="Background Tegal">
        
        <div class="absolute inset-0 bg-[#1a1a1a]/70 backdrop-blur-[2px]"></div>
        
        <div class="absolute top-0 right-0 -mt-20 -mr-20 w-[600px] h-[600px] bg-[#8D734B]/30 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-[500px] h-[500px] bg-white/10 rounded-full blur-[100px]"></div>
        
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#ffffff 0.5px, transparent 0.5px); background-size: 30px 30px;"></div>
    </div>

    <style>
        .custom-scrollbar::-webkit-scrollbar { width: 5px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 10px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #8D734B; border-radius: 10px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #6b5638; }
    </style>

    <div class="container mx-auto px-4 text-center relative z-10">
        <h1 class="text-4xl md:text-7xl font-black text-white mb-6 tracking-tight leading-tight drop-shadow-2xl" x-text="t('title')">
            Peluang Investasi Strategis
        </h1>
        <p class="text-white/90 text-lg md:text-2xl mb-12 max-w-4xl mx-auto leading-relaxed font-medium drop-shadow-lg" x-text="t('subtitle')">
            Temukan berbagai potensi proyek unggulan di Kabupaten Tegal yang siap untuk dikembangkan bersama mitra strategis.
        </p>
        
        <div class="max-w-6xl mx-auto bg-white/95 backdrop-blur-xl p-4 md:p-6 rounded-[2.5rem] shadow-[0_35px_60px_-15px_rgba(0,0,0,0.6)] border border-white/30">
            <form action="#" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4 text-left">
                
                <div class="relative" x-data="{ open: false, selected: '', label: '' }" @click.away="open = false">
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform scale-95 translate-y-5"
                         x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                         class="absolute bottom-full z-50 w-full mb-3 bg-white border border-gray-100 rounded-2xl shadow-2xl overflow-hidden">
                        <div class="max-h-60 overflow-y-auto custom-scrollbar">
                            <template x-for="kec in ['Adiwerna', 'Balapulang', 'Bojong', 'Bumijawa', 'Dukuhturi', 'Dukuhwaru', 'Jatinegara', 'Kedungbanteng', 'Kramat', 'Lebaksiu', 'Margasari', 'Pangkah', 'Slawi', 'Suradadi', 'Talang', 'Tarub', 'Warureja']">
                                <div @click="selected = kec; label = kec; open = false" 
                                     class="px-5 py-3.5 text-sm text-gray-700 hover:bg-[#8D734B] hover:text-white cursor-pointer transition-colors font-semibold"
                                     x-text="kec">
                                </div>
                            </template>
                        </div>
                    </div>

                    <div @click="open = !open" class="w-full pl-12 pr-10 py-5 bg-gray-50 border border-gray-200 rounded-2xl text-gray-700 cursor-pointer font-bold text-sm flex items-center justify-between hover:bg-white transition-all focus:ring-2 focus:ring-[#8D734B]">
                        <div class="absolute left-4 text-[#8D734B]">
                            <i class="fas fa-map-marker-alt text-lg"></i>
                        </div>
                        <span x-text="label || t('pilih_kecamatan')" class="truncate uppercase tracking-wider"></span>
                        <i class="fas fa-chevron-up text-xs text-gray-400 transition-transform duration-300" :class="open ? 'rotate-180' : ''"></i>
                    </div>
                    <input type="hidden" name="kecamatan" :value="selected">
                </div>

                <div class="relative" x-data="{ open: false, selected: '', label: '' }" @click.away="open = false">
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform scale-95 translate-y-5"
                         x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                         class="absolute bottom-full z-50 w-full mb-3 bg-white border border-gray-100 rounded-2xl shadow-2xl overflow-hidden">
                        <div class="max-h-60 overflow-y-auto custom-scrollbar">
                            <template x-for="sektor in ['Manufaktur', 'Pertanian', 'Pariwisata', 'Perdagangan', 'Jasa', 'Infrastruktur']">
                                <div @click="selected = sektor; label = sektor; open = false" 
                                     class="px-5 py-3.5 text-sm text-gray-700 hover:bg-[#8D734B] hover:text-white cursor-pointer transition-colors font-semibold"
                                     x-text="sektor">
                                </div>
                            </template>
                        </div>
                    </div>

                    <div @click="open = !open" class="w-full pl-12 pr-10 py-5 bg-gray-50 border border-gray-200 rounded-2xl text-gray-700 cursor-pointer font-bold text-sm flex items-center justify-between hover:bg-white transition-all focus:ring-2 focus:ring-[#8D734B]">
                        <div class="absolute left-4 text-[#8D734B]">
                            <i class="fas fa-industry text-lg"></i>
                        </div>
                        <span x-text="label || t('pilih_sektor')" class="truncate uppercase tracking-wider"></span>
                        <i class="fas fa-chevron-up text-xs text-gray-400 transition-transform duration-300" :class="open ? 'rotate-180' : ''"></i>
                    </div>
                    <input type="hidden" name="sektor" :value="selected">
                </div>

                <div class="relative">
                    <div class="absolute inset-y-0 left-4 flex items-center text-[#8D734B] pointer-events-none">
                        <i class="fas fa-search text-lg"></i>
                    </div>
                    <input type="text" name="q" :placeholder="t('cari_proyek')" 
                           class="w-full pl-12 pr-4 py-5 bg-gray-50 border border-gray-200 rounded-2xl text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#8D734B] font-bold text-sm uppercase tracking-wider placeholder:text-gray-400">
                </div>

                <button type="submit" class="bg-[#8D734B] hover:bg-amber-900 text-white py-5 rounded-2xl font-black flex items-center justify-center gap-3 transition-all duration-300 shadow-xl shadow-[#8D734B]/30 uppercase tracking-[0.2em] text-sm transform active:scale-95 group">
                    <i class="fas fa-search group-hover:scale-125 transition-transform"></i> <span x-text="t('btn_cari')">Cari</span>
                </button>
            </form>
        </div>
    </div>
</section>

    <div class="container mx-auto py-24 px-4 md:px-10">
        <div class="flex flex-col lg:flex-row gap-16">
            <div class="w-full lg:w-1/4">
                <div class="sticky top-28 space-y-8 bg-white p-8 rounded-[2rem] border border-gray-100 shadow-[0_10px_40px_-15px_rgba(0,0,0,0.05)]">
                    <div>
                        <h3 class="text-xl font-black text-gray-900 border-b-4 border-[#8D734B] w-fit pb-1 mb-8 uppercase tracking-widest" x-text="t('filter_by')"></h3>
                        
                        <div class="mb-10">
                            <label class="text-sm font-black text-gray-800 block mb-4 flex justify-between">
                                <span x-text="t('nilai_investasi')"></span>
                                <span id="rangeValue" class="text-white font-extrabold text-[10px] bg-[#8D734B] px-3 py-1 rounded-full shadow-sm">Rp 0</span>
                            </label>
                            
                            <input type="range" id="investasiSlider" min="0" max="1000000000000" step="100000000" value="0"
                                class="w-full h-1.5 bg-gray-100 rounded-lg appearance-none cursor-pointer accent-[#8D734B]">
                            
                            <div class="flex justify-between mt-3 text-[10px] text-gray-400 font-bold uppercase tracking-tighter">
                                <span>Rp 0</span>
                                <span>Rp 1 <span x-text="t('triliun')"></span>+</span>
                            </div>
                            
                            <div class="flex gap-3 mt-6">
                                <div class="relative w-full">
                                    <span class="absolute left-3 top-2 text-[9px] text-gray-400 font-black uppercase" x-text="t('min')"></span>
                                    <input type="text" id="minInput" placeholder="Rp 0" readonly class="w-full pt-5 pb-2 px-3 text-xs border border-gray-100 rounded-xl bg-gray-50 font-bold text-gray-600">
                                </div>
                                <div class="relative w-full">
                                    <span class="absolute left-3 top-2 text-[9px] text-gray-400 font-black uppercase" x-text="t('max')"></span>
                                    <input type="text" id="maxInput" value="Rp 0" readonly class="w-full pt-5 pb-2 px-3 text-xs border border-gray-100 rounded-xl bg-amber-50 font-black text-[#8D734B]">
                                </div>
                            </div>
                            
                            <button class="w-full mt-6 bg-green-600 hover:bg-green-700 text-white py-4 rounded-xl text-xs font-black shadow-lg shadow-green-200 transition-all transform active:scale-95 uppercase tracking-widest" x-text="t('apply_filter')"></button>
                        </div>

                        <div class="mb-10 p-5 bg-gray-50 rounded-2xl border border-gray-100">
                            <label class="text-xs font-black text-gray-900 block mb-4 uppercase tracking-widest" x-text="t('kat_sektor')"></label>
                            <div class="space-y-3 max-h-48 overflow-y-auto pr-2 custom-scrollbar text-sm">
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="checkbox" class="w-4 h-4 rounded text-[#8D734B] focus:ring-[#8D734B] border-gray-300"> 
                                    <span class="font-bold text-gray-600 group-hover:text-[#8D734B] transition-colors" x-text="t('pariwisata')"></span>
                                </label>
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="checkbox" class="w-4 h-4 rounded text-[#8D734B] focus:ring-[#8D734B] border-gray-300"> 
                                    <span class="font-bold text-gray-600 group-hover:text-[#8D734B] transition-colors" x-text="t('industri')"></span>
                                </label>
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="checkbox" class="w-4 h-4 rounded text-[#8D734B] focus:ring-[#8D734B] border-gray-300"> 
                                    <span class="font-bold text-gray-600 group-hover:text-[#8D734B] transition-colors" x-text="t('pertanian')"></span>
                                </label>
                            </div>
                            <button class="text-[10px] text-[#8D734B] font-black mt-5 hover:underline flex items-center gap-2 uppercase tracking-widest">
                                <i class="fas fa-plus-circle"></i> <span x-text="t('lihat_lainnya')"></span>
                            </button>
                        </div>

                        <div>
                            <label class="text-xs font-black text-gray-900 block mb-4 uppercase tracking-widest" x-text="t('klasifikasi')"></label>
                            <div class="flex flex-wrap gap-2">
                                <button class="px-4 py-2 text-[9px] font-black border-2 border-gray-100 rounded-full hover:border-[#8D734B] hover:text-[#8D734B] transition-all uppercase tracking-widest" x-text="t('strategis')"></button>
                                <button class="px-4 py-2 text-[9px] font-black border-2 border-gray-100 rounded-full hover:border-[#8D734B] hover:text-[#8D734B] transition-all uppercase tracking-widest" x-text="t('prospektif')"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-3/4">
                <div class="flex flex-col md:flex-row justify-between items-md-center mb-10 gap-6">
                    <div>
                        <h2 class="text-4xl font-black text-gray-900 tracking-tighter" x-text="t('daftar_proyek')"></h2>
                        <p class="text-gray-400 text-sm mt-2 font-medium">
                           <span x-text="t('ditemukan')"></span> {{ $semuaPeluang->count() }} <span x-text="t('sesuai_kriteria')"></span>
                        </p>
                    </div>
                    <div class="flex items-center gap-4 bg-gray-50 px-5 py-3 rounded-2xl border border-gray-100">
                        <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest"><span x-text="t('urutkan')"></span>:</span>
                        <select class="bg-transparent font-black text-xs text-[#8D734B] outline-none border-none focus:ring-0 cursor-pointer uppercase tracking-widest">
                            <option x-text="t('terbaru')"></option>
                            <option x-text="t('nilai_tertinggi')"></option>
                            <option>A - Z</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    @forelse($semuaPeluang as $item)
                    <div class="group bg-white rounded-[2.5rem] shadow-[0_20px_50px_-20px_rgba(0,0,0,0.05)] hover:shadow-[0_40px_80px_-20px_rgba(0,0,0,0.15)] transition-all duration-700 border border-gray-50 overflow-hidden flex flex-col h-full transform hover:-translate-y-2">
                        <div class="h-72 bg-gray-100 relative overflow-hidden">
                            @if($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-[1.5s]">
                            @else
                                <div class="flex flex-col items-center justify-center h-full text-gray-200 bg-gray-50">
                                    <i class="fas fa-city text-6xl mb-4 opacity-20"></i>
                                    <span class="text-[10px] font-black uppercase tracking-[0.3em]">No Image Available</span>
                                </div>
                            @endif
                            
                            <div class="absolute top-5 right-5 bg-white/90 backdrop-blur-md text-[#8D734B] text-[9px] font-black px-5 py-2.5 rounded-full shadow-xl uppercase tracking-[0.2em] border border-white/50" x-text="t('tersedia')"></div>

                            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent p-8 pt-20">
                                <p class="text-white/60 text-[9px] font-black uppercase tracking-[0.3em] mb-2" x-text="t('estimasi')"></p>
                                <p class="text-white font-black text-2xl tracking-tight">Rp {{ number_format($item->nilai_investasi, 0, ',', '.') }}</p>
                            </div>
                        </div>

                        <div class="p-8 flex flex-col flex-grow">
                            <h2 class="text-2xl font-black text-gray-900 mb-6 group-hover:text-[#8D734B] transition-colors line-clamp-2 leading-tight h-16">
                                {{ $item->nama_proyek }}
                            </h2>
                            <div class="mt-auto">
                                <a href="{{ route('peluang.show', $item->id) }}" class="flex items-center justify-center gap-4 w-full bg-gray-900 hover:bg-[#8D734B] text-white py-5 rounded-2xl font-black transition-all duration-500 shadow-xl active:scale-95 group/btn uppercase tracking-widest text-xs">
                                    <span x-text="t('detail')"></span>
                                    <i class="fas fa-chevron-right text-[10px] group-hover/btn:translate-x-2 transition-transform"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full py-28 bg-gray-50 rounded-[3rem] border-2 border-dashed border-gray-200 flex flex-col items-center justify-center text-center px-10">
                        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-6">
                            <i class="fas fa-folder-open text-3xl text-gray-300"></i>
                        </div>
                        <h3 class="text-3xl font-black text-gray-900 mb-4 tracking-tighter" x-text="t('tidak_ada')"></h3>
                        <p class="text-gray-400 max-w-sm mb-10 font-medium leading-relaxed" x-text="t('msg_tidak_ada')"></p>
                        <button class="flex items-center gap-3 bg-[#8D734B] text-white px-10 py-4 rounded-2xl font-black shadow-2xl shadow-[#8D734B]/40 hover:bg-[#6b5638] transition-all transform active:scale-95 uppercase tracking-widest text-xs">
                            <i class="fas fa-redo-alt"></i> <span x-text="t('reset')"></span>
                        </button>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const slider = document.getElementById('investasiSlider');
    const rangeDisplay = document.getElementById('rangeValue');
    const maxInput = document.getElementById('maxInput');

    function formatRupiah(value) {
        const lang = document.documentElement.lang || 'id';
        let unit = '';
        if (value >= 1000000000000) {
            if(lang === 'id') unit = 'Triliun';
            else if(lang === 'zh') unit = '万亿';
            else if(lang === 'ja') unit = '兆';
            else if(lang === 'kr') unit = '조';
            else unit = 'Trillion';
            
            return 'Rp ' + (value / 1000000000000).toFixed(1) + ' ' + unit;
        } else if (value >= 1000000000) {
            if(lang === 'id') unit = 'Miliar';
            else if(lang === 'zh') unit = '十亿';
            else if(lang === 'ja') unit = '十億';
            else if(lang === 'kr') unit = '십억';
            else unit = 'Billion';

            return 'Rp ' + (value / 1000000000).toFixed(0) + ' ' + unit;
        }
        return 'Rp ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    function updateSliderUI() {
        const val = parseInt(slider.value);
        rangeDisplay.textContent = formatRupiah(val);
        maxInput.value = formatRupiah(val);
    }

    slider.addEventListener('input', updateSliderUI);
    // Listener tambahan jika sistem translate Anda memicu event custom
    window.addEventListener('language-refreshed', updateSliderUI);
});
</script>
@endsection