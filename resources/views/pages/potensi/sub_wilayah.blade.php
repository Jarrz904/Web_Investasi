@extends('layouts.app')

@section('content')
<div x-data="{ 
    lang: localStorage.getItem('selectedLang') || 'id',
    content: {
        id: {
            hero_t: 'Daerah', hero_st: 'Eksplorasi 18 Kecamatan di Kabupaten Tegal', hero_desc: 'Setiap daerah memiliki karakteristik dan potensi unik yang dapat dikembangkan untuk investasi dan pembangunan.',
            sub_title: 'Sub Wilayah Kota', sub_desc: 'Wilayah administrasi Kabupaten Tegal terbagi menjadi 18 kecamatan yang dikelompokkan berdasarkan potensi geografis dan ekonomi.', kec_tag: 'Kecamatan',
            north_t: 'Wilayah Utara', north_d: 'Potensi maritim, industri pengolahan ikan, dan pariwisata pantai.',
            mid_t: 'Wilayah Tengah', mid_d: 'Pusat bisnis, industri logam, perdagangan, dan administrasi pemerintahan.',
            south_t: 'Wilayah Selatan', south_d: 'Potensi agrobisnis, holtikultura, peternakan, dan wisata pegunungan.',
            contact_t: 'Hubungi Kami', form_name: 'Nama Lengkap', form_email: 'Email', form_select: 'Pilih Daerah yang Diminati', form_msg: 'Pesan', form_btn: 'Kirim Pesan'
        },
        en: {
            hero_t: 'Regions', hero_st: 'Exploring 18 Districts in Tegal Regency', hero_desc: 'Each region has unique characteristics and potential that can be developed for investment and development.',
            sub_title: 'Urban Sub-Regions', sub_desc: 'The administrative area of Tegal Regency is divided into 18 districts grouped by geographical and economic potential.', kec_tag: 'Districts',
            north_t: 'Northern Region', north_d: 'Maritime potential, fish processing industry, and coastal tourism.',
            mid_t: 'Central Region', mid_d: 'Business center, metal industry, trade, and government administration.',
            south_t: 'Southern Region', south_d: 'Agrobusiness potential, horticulture, livestock, and mountain tourism.',
            contact_t: 'Contact Us', form_name: 'Full Name', form_email: 'Email', form_select: 'Select Interested Region', form_msg: 'Message', form_btn: 'Send Message'
        },
        jp: {
            hero_t: '地域', hero_st: 'テガル県の18地区を探索する', hero_desc: '各地域には、投資や開発のために活用できる独自の特徴と可能性があります。',
            sub_title: '都市サブ地域', sub_desc: 'テガル県の行政区域は、地理的および経済的ポテンシャルに基づいて18の地区に分かれています。', kec_tag: '地区',
            north_t: '北部地域', north_d: '海洋ポテンシャル、魚類加工業、沿岸観光。',
            mid_t: '中部地域', mid_d: 'ビジネスセンター、金属産業、貿易、および政府行政。',
            south_t: '南部地域', south_d: 'アグリビジネス、園芸、畜産、および山岳観光。',
            contact_t: 'お問い合わせ', form_name: '氏名', form_email: 'メールアドレス', form_select: '興味のある地域を選択', form_msg: 'メッセージ', form_btn: 'メッセージを送信'
        },
        kr: {
            hero_t: '지역', hero_st: '테갈군 18개 읍·면 탐방', hero_desc: '각 지역은 투자와 개발을 위해 발전시킬 수 있는 고유한 특성과 잠재력을 가지고 있습니다.',
            sub_title: '도시 하위 지역', sub_desc: '테갈군의 행정 구역은 지리적, 경제적 잠재력에 따라 18개 구역으로 나뉩니다.', kec_tag: '읍·면',
            north_t: '북부 지역', north_d: '해양 잠재력, 수산물 가공 산업 및 해안 관광.',
            mid_t: '중부 지역', mid_d: '비즈니스 센터, 금속 산업, 무역 및 정부 행정.',
            south_t: '남부 지역', south_d: '농업 비즈니스 잠재력, 원예, 축산업 및 산악 관광.',
            contact_t: '문의하기', form_name: '성함', form_email: '이메일', form_select: '관심 지역 선택', form_msg: '메시지', form_btn: '메시지 보내기'
        },
        cn: {
            hero_t: '地区', hero_st: '探索德加尔县的 18 个区', hero_desc: '每个地区都具有独特的特征和潜力，可用于投资和建设。',
            sub_title: '城市次区域', sub_desc: '德加尔县的行政区域根据地理和经济潜力分为 18 个区。', kec_tag: '区',
            north_t: '北部地区', north_d: '海洋潜力、鱼类加工业和沿海旅游。',
            mid_t: '中部地区', mid_d: '商业中心、金属工业、贸易和政府行政。',
            south_t: '南部地区', south_d: '农业综合企业潜力、园艺、畜牧业和山地旅游。',
            contact_t: '联系我们', form_name: '全名', form_email: '电子邮件', form_select: '选择感兴趣的地区', form_msg: '留言', form_btn: '发送留言'
        }
    }
}" @language-changed.window="lang = $event.detail">

    <section class="relative h-[60vh] md:h-[70vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/background.jpeg') }}" class="w-full h-full object-cover" alt="Background">
            <div class="absolute inset-0 bg-black/50"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10 text-center text-white">
            <h1 class="text-5xl md:text-7xl font-bold mb-4 tracking-tight" data-aos="fade-up" x-text="content[lang].hero_t"></h1>
            <p class="text-xl md:text-2xl font-medium mb-2" data-aos="fade-up" data-aos-delay="100" x-text="content[lang].hero_st"></p>
            <p class="text-sm md:text-base max-w-2xl mx-auto opacity-90 leading-relaxed" data-aos="fade-up" data-aos-delay="200" x-text="content[lang].hero_desc"></p>
        </div>
    </section>

    <section class="py-20 bg-[#F8F9FA]">
        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row gap-12 items-start">
                <div class="lg:w-1/3">
                    <h2 class="text-4xl font-bold text-gray-900 leading-tight mb-4" x-text="content[lang].sub_title"></h2>
                    <p class="text-gray-600 leading-relaxed mb-6" x-text="content[lang].sub_desc"></p>
                    <div class="inline-block bg-[#8D734B] text-white px-6 py-2 rounded-full font-bold text-sm">
                        18 <span x-text="content[lang].kec_tag"></span>
                    </div>
                </div>

                <div class="lg:w-2/3 w-full grid grid-cols-2 md:grid-cols-3 gap-4">
                    @php
                        $kecamatans = ['Slawi','Adiwerna','Talang','Dukuhturi','Tarub','Pangkah','Lebaksiu','Balapulang','Bojong','Bumijawa','Jatinegara','Margasari','Kramat','Suradadi','Warureja','Dukuhwaru','Kedungbanteng','Pagerbarang'];
                    @endphp

                    @foreach($kecamatans as $kec)
                        <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 hover:border-[#8D734B] hover:shadow-md transition-all group">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-amber-50 rounded-lg flex items-center justify-center text-[#8D734B] group-hover:bg-[#8D734B] group-hover:text-white transition-colors">
                                    <i class="fas fa-map-marker-alt text-xs"></i>
                                </div>
                                <span class="font-bold text-gray-700">{{ $kec }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="group bg-gray-50 p-10 rounded-[2.5rem] border-b-4 border-blue-500 hover:shadow-2xl transition-all duration-300">
                    <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mb-6 text-blue-600">
                        <i class="fas fa-ship text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-3 text-gray-800" x-text="content[lang].north_t"></h3>
                    <p class="text-gray-600 text-sm mb-6 leading-relaxed" x-text="content[lang].north_d"></p>
                    <div class="flex flex-wrap gap-2">
                        <template x-for="item in ['Kramat','Suradadi','Warureja']">
                            <span class="bg-blue-50 text-blue-700 px-3 py-1 rounded-lg text-[10px] font-bold uppercase tracking-wider" x-text="item"></span>
                        </template>
                    </div>
                </div>

                <div class="group bg-gray-50 p-10 rounded-[2.5rem] border-b-4 border-amber-600 hover:shadow-2xl transition-all duration-300">
                    <div class="w-16 h-16 bg-amber-100 rounded-2xl flex items-center justify-center mb-6 text-[#8D734B]">
                        <i class="fas fa-city text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-3 text-gray-800" x-text="content[lang].mid_t"></h3>
                    <p class="text-gray-600 text-sm mb-6 leading-relaxed" x-text="content[lang].mid_d"></p>
                    <div class="flex flex-wrap gap-2">
                        <template x-for="item in ['Slawi','Adiwerna','Talang']">
                            <span class="bg-amber-50 text-amber-700 px-3 py-1 rounded-lg text-[10px] font-bold uppercase tracking-wider" x-text="item"></span>
                        </template>
                    </div>
                </div>

                <div class="group bg-gray-50 p-10 rounded-[2.5rem] border-b-4 border-green-600 hover:shadow-2xl transition-all duration-300">
                    <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center mb-6 text-green-600">
                        <i class="fas fa-mountain text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-3 text-gray-800" x-text="content[lang].south_t"></h3>
                    <p class="text-gray-600 text-sm mb-6 leading-relaxed" x-text="content[lang].south_d"></p>
                    <div class="flex flex-wrap gap-2">
                        <template x-for="item in ['Bojong','Bumijawa','Balapulang']">
                            <span class="bg-green-50 text-green-700 px-3 py-1 rounded-lg text-[10px] font-bold uppercase tracking-wider" x-text="item"></span>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-gray-50 border-t">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
                <div>
                    <h2 class="text-3xl font-bold mb-8 text-gray-900" x-text="content[lang].contact_t"></h2>
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-white shadow-sm rounded-xl flex items-center justify-center text-[#8D734B]">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Email</p>
                                <p class="text-gray-800 font-medium">pmptsp@tegalkab.go.id</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-white shadow-sm rounded-xl flex items-center justify-center text-[#8D734B]">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Hotline</p>
                                <p class="text-gray-800 font-medium">+62 815 6900 777</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 md:p-10 rounded-[2.5rem] shadow-xl border border-gray-100">
                    <form action="#" class="space-y-4">
                        <input type="text" :placeholder="content[lang].form_name"
                            class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-none ring-1 ring-gray-200 focus:ring-2 focus:ring-[#8D734B] transition-all">
                        <input type="email" :placeholder="content[lang].form_email"
                            class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-none ring-1 ring-gray-200 focus:ring-2 focus:ring-[#8D734B] transition-all">
                        
                        <div class="relative">
                            <select class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-none ring-1 ring-gray-200 focus:ring-2 focus:ring-[#8D734B] text-gray-500 appearance-none">
                                <option selected disabled x-text="content[lang].form_select"></option>
                                @foreach($kecamatans as $kec)
                                    <option value="{{ $kec }}">{{ $kec }}</option>
                                @endforeach
                            </select>
                            <div class="absolute right-6 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400">
                                <i class="fas fa-chevron-down text-xs"></i>
                            </div>
                        </div>

                        <textarea :placeholder="content[lang].form_msg" rows="4"
                            class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-none ring-1 ring-gray-200 focus:ring-2 focus:ring-[#8D734B] transition-all"></textarea>
                        
                        <button class="w-full bg-[#8D734B] hover:bg-[#6d593a] text-white font-bold py-5 rounded-2xl shadow-lg shadow-amber-900/20 transition-all transform hover:-translate-y-1"
                                x-text="content[lang].form_btn">
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    /* Prevent layout shift before Alpine loads */
    [x-cloak] { display: none !important; }
</style>
@endsection