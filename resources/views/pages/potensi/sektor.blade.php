@extends('layouts.app')

@section('content')
<section class="relative h-[60vh] md:h-[70vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/background.jpeg') }}" alt="Sektor Investasi" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/50"></div> 
    </div>

    <div class="container mx-auto px-6 relative z-10 text-center text-white">
        <h1 class="text-5xl md:text-7xl font-bold mb-4 tracking-tight" x-text="t('sektor investasi')">
            Sektor Investasi
        </h1>
        
        <p class="text-lg md:text-xl font-medium mb-6 opacity-90" x-text="t('peluang investasi subtitle')">
            Peluang Investasi di Berbagai Sektor
        </p>

        <div class="max-w-4xl mx-auto">
            <p class="text-sm md:text-lg leading-relaxed opacity-80" x-text="t('hero sektor desc')">
                Kabupaten Tegal menawarkan berbagai peluang investasi di berbagai sektor yang menjanjikan dengan dukungan infrastruktur dan kebijakan yang mendukung.
            </p>
        </div>
    </div>
</section>

<section class="bg-gray-50 py-24 relative overflow-hidden">
    <div class="container mx-auto px-6 md:px-10 lg:px-20">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16">
            <div class="max-w-2xl text-center md:text-left">
                <h2 class="text-4xl md:text-5xl font-black text-gray-900 tracking-tighter uppercase leading-tight" x-text="t('sektor')">
                    Sektor
                </h2>
                <p class="text-gray-500 mt-4 text-sm md:text-base" x-text="t('jelajahi sektor desc')">
                    Jelajahi berbagai sektor investasi yang tersedia di Kabupaten Tegal.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                // Perbaikan ikon agar terbaca sempurna di semua versi FontAwesome
                $sektors = [
                    ['icon' => 'fa-hotel', 'key' => 'akomodasi dan makan minum'],
                    ['icon' => 'fa-tractor', 'key' => 'pertanian'],
                    ['icon' => 'fa-masks-theater', 'key' => 'kesenian hiburan dan rekreasi'],
                    ['icon' => 'fa-hard-hat', 'key' => 'konstruksi'], // Diganti ke fa-hard-hat agar lebih kompatibel
                    ['icon' => 'fa-shield-alt', 'key' => 'pertahanan dan jaminan sosial'], // Diganti ke fa-shield-alt
                    ['icon' => 'fa-graduation-cap', 'key' => 'pendidikan'],
                    ['icon' => 'fa-laptop-code', 'key' => 'teknologi dan informasi'],
                    ['icon' => 'fa-file-invoice-dollar', 'key' => 'keuangan dan asuransi'],
                    ['icon' => 'fa-notes-medical', 'key' => 'kesehatan'],
                ];
            @endphp

            @foreach($sektors as $s)
            <div class="group bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 flex flex-col items-center text-center cursor-pointer">
                <div class="w-20 h-20 mb-6 flex items-center justify-center rounded-2xl bg-amber-50 group-hover:bg-[#8D734B] transition-colors duration-300">
                    <i class="fas {{ $s['icon'] }} text-3xl text-[#8D734B] group-hover:text-white transition-colors duration-300"></i>
                </div>
                
                <h4 class="font-bold text-gray-800 text-lg mb-3 uppercase tracking-tight" x-text="t('{{ $s['key'] }}')"></h4>
                
                <div class="w-10 h-1 bg-gray-100 group-hover:bg-[#8D734B] group-hover:w-20 transition-all duration-500 rounded-full"></div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection