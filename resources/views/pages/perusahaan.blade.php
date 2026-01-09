@extends('layouts.app')

@section('content')
    {{-- Inisialisasi Alpine.js dengan integrasi Global Language --}}
    <div class="bg-[#F8F9FA] min-h-screen pb-20" 
         x-data="{ 
            search: '',
            selectedSektor: '',
            selectedJenis: '',
            selectedWilayah: '',
            selectedStatus: '',
            sortBy: 'terbesar',
            {{-- Mengambil bahasa dari localStorage agar sinkron dengan app.blade --}}
            currentLang: localStorage.getItem('selectedLang') || 'id',
            showModal: false,
            activeCompany: {},
            translations: {
                id: {
                    total_investasi: 'Total Investasi', total_perusahaan: 'Total Perusahaan', lapangan_kerja: 'Lapangan Kerja', realisasi: 'Realisasi',
                    tahun_berjalan: 'Tahun Berjalan', nilai_investasi: 'Nilai Investasi', perusahaan_berinvestasi: 'Perusahaan Berinvestasi', tenaga_kerja: 'Tenaga Kerja Terserap',
                    placeholder_cari: 'Cari nama perusahaan atau sektor investasi...', semua_sektor: 'Semua Sektor', semua_jenis: 'Semua Jenis', semua_wilayah: 'Semua Wilayah',
                    semua_status: 'Semua Status', urut_investasi: 'Nilai Investasi (Terbesar)', lihat_detail: 'Lihat Detail', beroperasi: 'Beroperasi',
                    prioritas: 'Prioritas Daerah', nasional: 'Strategis Nasional', tenaga_kerja_label: 'Tenaga Kerja:', tahun_mulai: 'Tahun Mulai:',
                    tidak_ditemukan: 'Data perusahaan tidak ditemukan.', detail_title: 'Detail Perusahaan', alamat: 'Alamat:', tutup: 'Tutup', konstruksi: 'Konstruksi'
                },
                en: {
                    total_investasi: 'Total Investment', total_perusahaan: 'Total Companies', lapangan_kerja: 'Jobs Created', realisasi: 'Realization',
                    tahun_berjalan: 'Current Year', nilai_investasi: 'Investment Value', perusahaan_berinvestasi: 'Invested Companies', tenaga_kerja: 'Absorbed Workforce',
                    placeholder_cari: 'Search company name or sector...', semua_sektor: 'All Sectors', semua_jenis: 'All Types', semua_wilayah: 'All Regions',
                    semua_status: 'All Status', urut_investasi: 'Investment Value (Highest)', lihat_detail: 'View Detail', beroperasi: 'Operating',
                    prioritas: 'Local Priority', nasional: 'National Strategic', tenaga_kerja_label: 'Workforce:', tahun_mulai: 'Start Year:',
                    tidak_ditemukan: 'No companies found.', detail_title: 'Company Detail', alamat: 'Address:', tutup: 'Close', konstruksi: 'Construction'
                },
                jp: {
                    total_investasi: '総投資額', total_perusahaan: '合計企業数', lapangan_kerja: '雇用創出', realisasi: '実績',
                    tahun_berjalan: '今年度', nilai_investasi: '投資価値', perusahaan_berinvestasi: '投資企業', tenaga_kerja: '吸収労働力',
                    placeholder_cari: '会社名またはセクターで検索...', semua_sektor: '全セクター', semua_jenis: '全タイプ', semua_wilayah: '全地域',
                    semua_status: '全ステータス', urut_investasi: '投資額（最高）', lihat_detail: '詳細を見る', beroperasi: '稼働中',
                    prioritas: '地域優先', nasional: '国家戦略', tenaga_kerja_label: '労働力:', tahun_mulai: '開始年:',
                    tidak_ditemukan: 'データなし', detail_title: '会社の詳細', alamat: '住所:', tutup: '閉じる', konstruksi: '建設中'
                },
                kr: {
                    total_investasi: '총 투자액', total_perusahaan: '총 기업 수', lapangan_kerja: '일자리 창출', realisasi: '실현',
                    tahun_berjalan: '현재 연도', nilai_investasi: '투자 가치', perusahaan_berinvestasi: '투자 기업', tenaga_kerja: '흡수된 노동력',
                    placeholder_cari: '회사 이름 또는 부문 검색...', semua_sektor: '모든 부문', semua_jenis: '모든 유형', semua_wilayah: '모든 지역',
                    semua_status: '모든 상태', urut_investasi: '투자 가치 (최고)', lihat_detail: '상세 보기', beroperasi: '운영 중',
                    prioritas: '지역 우선', nasional: '국가 전략', tenaga_kerja_label: '노동력:', tahun_mulai: '시작 연도:',
                    tidak_ditemukan: '회사를 찾을 수 없습니다.', detail_title: '회사 세부 정보', alamat: '주소:', tutup: '닫기', konstruksi: '공사 중'
                },
                cn: {
                    total_investasi: '总投资额', total_perusahaan: '总企业数', lapangan_kerja: '创造就业', realisasi: '实现',
                    tahun_berjalan: '本年度', nilai_investasi: '投资价值', perusahaan_berinvestasi: '投资公司', tenaga_kerja: '吸收劳动力',
                    placeholder_cari: '搜索公司或行业...', semua_sektor: '所有部门', semua_jenis: '所有类型', semua_wilayah: '所有地区',
                    semua_status: '所有状态', urut_investasi: '投资价值（最高）', lihat_detail: '查看详情', beroperasi: '运营中',
                    prioritas: '地方优先', nasional: '国家战略', tenaga_kerja_label: '劳动力:', tahun_mulai: '开始年份:',
                    tidak_ditemukan: '未找到数据', detail_title: '公司详情', alamat: '地址:', tutup: '关闭', konstruksi: '施工中'
                }
            },
            t(key) {
                return this.translations[this.currentLang] ? (this.translations[this.currentLang][key] || this.translations['id'][key]) : this.translations['id'][key];
            },
            {{-- Mendengarkan perubahan bahasa dari Navbar (app.blade) --}}
            init() {
                window.addEventListener('language-changed', (event) => {
                    this.currentLang = event.detail;
                });
            },
            shouldShow(el) {
                const name = el.getAttribute('data-name').toLowerCase();
                const sektor = el.getAttribute('data-sektor');
                const jenis = el.getAttribute('data-jenis');
                const wilayah = el.getAttribute('data-wilayah');
                const status = el.getAttribute('data-status');

                const matchSearch = name.includes(this.search.toLowerCase()) || sektor.toLowerCase().includes(this.search.toLowerCase());
                const matchSektor = this.selectedSektor === '' || sektor === this.selectedSektor;
                const matchJenis = this.selectedJenis === '' || jenis === this.selectedJenis;
                const matchWilayah = this.selectedWilayah === '' || wilayah === this.selectedWilayah;
                const matchStatus = this.selectedStatus === '' || status === this.selectedStatus;

                return matchSearch && matchSektor && matchJenis && matchWilayah && matchStatus;
            },
            openDetail(data) {
                this.activeCompany = data;
                this.showModal = true;
                document.body.style.overflow = 'hidden';
            },
            closeDetail() {
                this.showModal = false;
                document.body.style.overflow = 'auto';
            }
         }" x-init="init()" x-cloak>

        {{-- Modal Detail --}}
        <div x-show="showModal" 
             class="fixed inset-0 z-[100] overflow-y-auto" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             style="display: none;">
            
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true" @click="closeDetail()">
                    <div class="absolute inset-0 bg-black opacity-60"></div>
                </div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div class="inline-block align-bottom bg-white rounded-[2rem] text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full">
                    <div class="bg-white p-8 md:p-12">
                        <div class="flex justify-between items-start mb-8">
                            <div>
                                <h3 class="text-xs font-black text-[#B08E5B] uppercase tracking-[0.2em] mb-2" x-text="t('detail_title')"></h3>
                                <h2 class="text-3xl font-black text-[#1A202C]" x-text="activeCompany.name"></h2>
                            </div>
                            <button @click="closeDetail()" class="text-gray-300 hover:text-gray-500 transition-colors">
                                <i class="fas fa-times text-2xl"></i>
                            </button>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <div class="space-y-6">
                                <div>
                                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1" x-text="t('semua_sektor')"></p>
                                    <p class="text-gray-700 font-semibold" x-text="activeCompany.sektor"></p>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1" x-text="t('alamat')"></p>
                                    <p class="text-gray-700 font-semibold" x-text="activeCompany.wilayah + ', Kabupaten Tegal'"></p>
                                </div>
                            </div>

                            <div class="bg-[#F8F9FA] p-6 rounded-2xl space-y-4">
                                <div>
                                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1" x-text="t('nilai_investasi')"></p>
                                    <p class="text-xl font-black text-[#1A202C]" x-text="activeCompany.investasi"></p>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1" x-text="t('tenaga_kerja_label')"></p>
                                    <p class="text-lg font-bold text-gray-700" x-text="activeCompany.tenaga"></p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-12">
                            <button @click="closeDetail()" 
                                    class="w-full bg-[#1A202C] text-white py-4 rounded-2xl font-bold text-xs hover:bg-gray-800 transition-all shadow-lg shadow-gray-200"
                                    x-text="t('tutup')">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Statistik Utama --}}
        <div class="container mx-auto px-4 md:px-10 py-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 flex flex-col items-center text-center">
                    <div class="mb-4 bg-gray-50 w-12 h-12 flex items-center justify-center rounded-xl">
                        <i class="fas fa-chart-line text-xl text-gray-700"></i>
                    </div>
                    <p class="text-gray-400 text-[11px] font-bold uppercase tracking-[0.15em] mb-2" x-text="t('total_investasi')"></p>
                    <h3 class="text-3xl font-black text-gray-900">Rp 1.6 T</h3>
                    <p class="text-[10px] text-gray-400 mt-2 italic" x-text="t('nilai_investasi')"></p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 flex flex-col items-center text-center">
                    <div class="mb-4 bg-gray-50 w-12 h-12 flex items-center justify-center rounded-xl">
                        <i class="fas fa-building text-xl text-gray-700"></i>
                    </div>
                    <p class="text-gray-400 text-[11px] font-bold uppercase tracking-[0.15em] mb-2" x-text="t('total_perusahaan')"></p>
                    <h3 class="text-3xl font-black text-gray-900">3</h3>
                    <p class="text-[10px] text-gray-400 mt-2 italic" x-text="t('perusahaan_berinvestasi')"></p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 flex flex-col items-center text-center">
                    <div class="mb-4 bg-gray-50 w-12 h-12 flex items-center justify-center rounded-xl">
                        <i class="fas fa-users text-xl text-gray-700"></i>
                    </div>
                    <p class="text-gray-400 text-[11px] font-bold uppercase tracking-[0.15em] mb-2" x-text="t('lapangan_kerja')"></p>
                    <h3 class="text-3xl font-black text-gray-900">1,850</h3>
                    <p class="text-[10px] text-gray-400 mt-2 italic" x-text="t('tenaga_kerja')"></p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 flex flex-col items-center text-center">
                    <p class="text-gray-400 text-[11px] font-bold uppercase tracking-[0.15em] mb-3">
                        <span x-text="t('realisasi')"></span> 2026
                    </p>
                    <h3 class="text-3xl font-black text-[#B08E5B]">Rp 1.1 T</h3>
                    <p class="text-[10px] text-gray-400 mt-3 italic" x-text="t('tahun_berjalan')"></p>
                </div>
            </div>
        </div>

        {{-- Filter & Search --}}
        <div class="container mx-auto px-4 md:px-10 mb-10">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <div class="flex flex-col gap-5">
                    <div class="relative">
                        <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-300"></i>
                        <input type="text" x-model="search" :placeholder="t('placeholder_cari')"
                            class="w-full pl-12 pr-4 py-3.5 bg-[#FDFDFD] border border-gray-100 rounded-xl focus:ring-1 focus:ring-amber-500 focus:outline-none text-sm transition-all placeholder:text-gray-300">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-5 gap-3">
                        <select x-model="selectedSektor" class="bg-white border border-gray-100 text-gray-500 text-xs rounded-xl px-4 py-3 outline-none cursor-pointer">
                            <option value="" x-text="t('semua_sektor')"></option>
                            <option value="Manufaktur">Manufaktur</option>
                            <option value="Teknologi">Teknologi</option>
                            <option value="Pertanian">Pertanian</option>
                        </select>
                        <select x-model="selectedJenis" class="bg-white border border-gray-100 text-gray-500 text-xs rounded-xl px-4 py-3 outline-none cursor-pointer">
                            <option value="" x-text="t('semua_jenis')"></option>
                            <option value="PMDN">PMDN</option>
                            <option value="PMA">PMA</option>
                        </select>
                        <select x-model="selectedWilayah" class="bg-white border border-gray-100 text-gray-500 text-xs rounded-xl px-4 py-3 outline-none cursor-pointer">
                            <option value="" x-text="t('semua_wilayah')"></option>
                            <option value="Slawi">Slawi</option>
                            <option value="Adiwerna">Adiwerna</option>
                            <option value="Kramat">Kramat</option>
                        </select>
                        <select x-model="selectedStatus" class="bg-white border border-gray-100 text-gray-500 text-xs rounded-xl px-4 py-3 outline-none cursor-pointer">
                            <option value="" x-text="t('semua_status')"></option>
                            <option value="Beroperasi" x-text="t('beroperasi')"></option>
                            <option value="Konstruksi" x-text="t('konstruksi')"></option>
                        </select>
                        <select x-model="sortBy" class="bg-white border border-gray-100 text-gray-800 text-xs font-bold rounded-xl px-4 py-3 outline-none cursor-pointer">
                            <option value="terbesar" x-text="t('urut_investasi')"></option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        {{-- Daftar Kartu Perusahaan --}}
        <div class="container mx-auto px-4 md:px-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                {{-- Card 1 --}}
                <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-50 overflow-hidden flex flex-col hover:shadow-xl transition-all duration-500 group"
                    x-show="shouldShow($el)" data-name="PT Industri Tegal Jaya" data-sektor="Manufaktur" data-jenis="PMDN"
                    data-wilayah="Slawi" data-status="Beroperasi">
                    <div class="h-48 bg-[#F4F6F8] relative flex items-center justify-center">
                        <div class="bg-white p-6 rounded-3xl shadow-sm group-hover:scale-110 transition-transform duration-500">
                            <i class="fas fa-building text-[#E2E8F0] text-5xl"></i>
                        </div>
                    </div>
                    <div class="p-10 flex-grow flex flex-col">
                        <h2 class="text-2xl font-black text-[#1A202C] mb-1 tracking-tight">PT Industri Tegal Jaya</h2>
                        <p class="text-sm text-gray-400 mb-6 font-medium">Manufaktur | Slawi</p>
                        <div class="flex flex-wrap gap-2 mb-8">
                            <span class="px-4 py-1.5 bg-[#EBF4FF] text-[#3182CE] text-[10px] font-black rounded-lg uppercase tracking-widest">PMDN</span>
                            <span class="px-4 py-1.5 bg-[#F7FAFC] text-[#4A5568] text-[10px] font-black rounded-lg uppercase tracking-widest" x-text="t('beroperasi')"></span>
                            <span class="px-4 py-1.5 bg-[#FFFBEB] text-[#B45309] text-[10px] font-black rounded-lg uppercase tracking-widest" x-text="t('prioritas')"></span>
                        </div>
                        <div class="space-y-4 mb-10 text-sm">
                            <div class="flex justify-between items-center pb-2 border-b border-gray-50">
                                <span class="text-gray-400 font-medium" x-text="t('nilai_investasi') + ':'"></span>
                                <span class="font-bold text-[#2D3748]">Rp 500.0 M</span>
                            </div>
                            <div class="flex justify-between items-center pb-2 border-b border-gray-50">
                                <span class="text-gray-400 font-medium" x-text="t('tenaga_kerja_label')"></span>
                                <span class="font-bold text-[#2D3748]">500 orang</span>
                            </div>
                        </div>
                        <div class="mt-auto">
                            <button @click="openDetail({name: 'PT Industri Tegal Jaya', sektor: 'Manufaktur', wilayah: 'Slawi', investasi: 'Rp 500.0 M', tenaga: '500 Orang'})"
                                class="w-full bg-[#1A202C] text-white py-4 rounded-2xl font-bold text-xs hover:bg-[#B08E5B] transition-all duration-300 flex items-center justify-center shadow-lg shadow-gray-200">
                                <span x-text="t('lihat_detail')"></span>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Card 2 --}}
                <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-50 overflow-hidden flex flex-col hover:shadow-xl transition-all duration-500 group"
                    x-show="shouldShow($el)" data-name="PT Global Tech Indonesia" data-sektor="Teknologi" data-jenis="PMA"
                    data-wilayah="Adiwerna" data-status="Konstruksi">
                    <div class="h-48 bg-[#F4F6F8] relative flex items-center justify-center">
                        <div class="bg-white p-6 rounded-3xl shadow-sm group-hover:scale-110 transition-transform duration-500">
                            <i class="fas fa-microchip text-[#E2E8F0] text-5xl"></i>
                        </div>
                    </div>
                    <div class="p-10 flex-grow flex flex-col">
                        <h2 class="text-2xl font-black text-[#1A202C] mb-1 tracking-tight">PT Global Tech Indonesia</h2>
                        <p class="text-sm text-gray-400 mb-6 font-medium">Teknologi | Adiwerna</p>
                        <div class="flex flex-wrap gap-2 mb-8">
                            <span class="px-4 py-1.5 bg-[#F0FFF4] text-[#38A169] text-[10px] font-black rounded-lg uppercase tracking-widest">PMA</span>
                            <span class="px-4 py-1.5 bg-[#F7FAFC] text-[#4A5568] text-[10px] font-black rounded-lg uppercase tracking-widest" x-text="t('konstruksi')"></span>
                        </div>
                        <div class="space-y-4 mb-10 text-sm">
                            <div class="flex justify-between items-center pb-2 border-b border-gray-50">
                                <span class="text-gray-400 font-medium" x-text="t('nilai_investasi') + ':'"></span>
                                <span class="font-bold text-[#2D3748]">Rp 750.0 M</span>
                            </div>
                            <div class="flex justify-between items-center pb-2 border-b border-gray-50">
                                <span class="text-gray-400 font-medium" x-text="t('tenaga_kerja_label')"></span>
                                <span class="font-bold text-[#2D3748]">300 orang</span>
                            </div>
                        </div>
                        <div class="mt-auto">
                            <button @click="openDetail({name: 'PT Global Tech Indonesia', sektor: 'Teknologi', wilayah: 'Adiwerna', investasi: 'Rp 750.0 M', tenaga: '300 Orang'})"
                                class="w-full bg-[#1A202C] text-white py-4 rounded-2xl font-bold text-xs hover:bg-[#B08E5B] transition-all duration-300 flex items-center justify-center shadow-lg shadow-gray-200">
                                <span x-text="t('lihat_detail')"></span>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Card 3 --}}
                <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-50 overflow-hidden flex flex-col hover:shadow-xl transition-all duration-500 group"
                    x-show="shouldShow($el)" data-name="PT Agro Makmur Sentosa" data-sektor="Pertanian" data-jenis="PMDN"
                    data-wilayah="Kramat" data-status="Beroperasi">
                    <div class="h-48 bg-[#F4F6F8] relative flex items-center justify-center">
                        <div class="bg-white p-6 rounded-3xl shadow-sm group-hover:scale-110 transition-transform duration-500">
                            <i class="fas fa-leaf text-[#E2E8F0] text-5xl"></i>
                        </div>
                    </div>
                    <div class="p-10 flex-grow flex flex-col">
                        <h2 class="text-2xl font-black text-[#1A202C] mb-1 tracking-tight">PT Agro Makmur Sentosa</h2>
                        <p class="text-sm text-gray-400 mb-6 font-medium">Pertanian | Kramat</p>
                        <div class="flex flex-wrap gap-2 mb-8">
                            <span class="px-4 py-1.5 bg-[#EBF4FF] text-[#3182CE] text-[10px] font-black rounded-lg uppercase tracking-widest">PMDN</span>
                            <span class="px-4 py-1.5 bg-[#F7FAFC] text-[#4A5568] text-[10px] font-black rounded-lg uppercase tracking-widest" x-text="t('beroperasi')"></span>
                        </div>
                        <div class="space-y-4 mb-10 text-sm">
                            <div class="flex justify-between items-center pb-2 border-b border-gray-50">
                                <span class="text-gray-400 font-medium" x-text="t('nilai_investasi') + ':'"></span>
                                <span class="font-bold text-[#2D3748]">Rp 300.0 M</span>
                            </div>
                        </div>
                        <div class="mt-auto">
                            <button @click="openDetail({name: 'PT Agro Makmur Sentosa', sektor: 'Pertanian', wilayah: 'Kramat', investasi: 'Rp 300.0 M', tenaga: 'Tidak disebutkan'})"
                                class="w-full bg-[#1A202C] text-white py-4 rounded-2xl font-bold text-xs hover:bg-[#B08E5B] transition-all duration-300 flex items-center justify-center shadow-lg shadow-gray-200">
                                <span x-text="t('lihat_detail')"></span>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
            
            {{-- Data Kosong State --}}
            <div class="mt-20 text-center py-20 bg-white rounded-[3rem] border border-dashed border-gray-200" 
                 x-show="![...$el.parentElement.querySelectorAll('[data-name]')].some(el => shouldShow(el))">
                <i class="fas fa-search text-gray-100 text-6xl mb-6"></i>
                <p class="text-gray-400 font-bold tracking-widest uppercase text-xs" x-text="t('tidak_ditemukan')"></p>
            </div>
        </div>
    </div>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&display=swap');
        body { font-family: 'Inter', sans-serif; }
        h2, h3 { letter-spacing: -0.025em; }
        select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%23acc0d8' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
            appearance: none;
        }
        [x-cloak] { display: none !important; }
    </style>
@endsection