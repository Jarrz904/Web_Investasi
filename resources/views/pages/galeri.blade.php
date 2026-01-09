@extends('layouts.app')

@section('content')
<div class="bg-white py-12">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-4xl font-bold text-slate-800 mb-4">Galeri Foto & Video</h1>
        <p class="text-gray-500 max-w-2xl mx-auto">Dokumentasi kegiatan dan pelayanan DPMPTSP Kabupaten Tegal</p>
    </div>
</div>

<div class="container mx-auto py-8 px-4 md:px-10">
    <div class="flex flex-col md:flex-row justify-between items-center gap-6 mb-12 bg-white p-4 rounded-lg shadow-sm border border-gray-100">
        
        <div class="flex bg-gray-100 p-1 rounded-md">
            <button class="filter-type-btn active px-6 py-2 rounded-md text-sm font-medium transition-all duration-200" data-type="all">Semua</button>
            <button class="filter-type-btn px-6 py-2 rounded-md text-sm font-medium transition-all duration-200" data-type="foto">Foto</button>
            <button class="filter-type-btn px-6 py-2 rounded-md text-sm font-medium transition-all duration-200" data-type="video">Video</button>
        </div>

        <div class="flex flex-wrap items-center gap-3 w-full md:w-auto">
            <select id="categoryFilter" class="bg-white border border-gray-300 text-gray-700 text-sm rounded-md focus:ring-amber-500 focus:border-amber-500 block p-2.5">
                <option value="all">Semua Kategori</option>
                <option value="INFRASTRUKTUR">Kegiatan Dinas</option>
                <option value="KEGIATAN">Pelayanan Publik</option>
                <option value="PROYEK">Kunjungan Tamu</option>
            </select>

            <select id="sortFilter" class="bg-white border border-gray-300 text-gray-700 text-sm rounded-md focus:ring-amber-500 focus:border-amber-500 block p-2.5">
                <option value="newest">Terbaru</option>
                <option value="oldest">Terlama</option>
                 <option value="populer">Terpopuler</option>
            </select>

            <div class="relative w-full md:w-64">
                <input type="text" id="searchInput" placeholder="Cari foto atau video..." 
                    class="w-full pl-4 pr-10 py-2.5 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-amber-500 text-sm">
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400">
                    <i class="fas fa-search"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8" id="galeriGrid">
        @forelse($semuaGaleri as $item)
            @php
                $extension = pathinfo($item->gambar, PATHINFO_EXTENSION);
                $isVideo = in_array(strtolower($extension), ['mp4', 'mov', 'avi', 'webm']);
            @endphp

            <div class="galeri-item bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300" 
                 data-type="{{ $isVideo ? 'video' : 'foto' }}" 
                 data-category="{{ strtoupper($item->kategori) }}" 
                 data-title="{{ strtolower($item->judul) }}">
                
                <div class="relative h-60 overflow-hidden group">
                    @if($isVideo)
                        <video class="w-full h-full object-cover">
                            <source src="{{ asset('storage/' . $item->gambar) }}" type="video/{{ $extension }}">
                        </video>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="bg-white/30 backdrop-blur-md p-4 rounded-full text-white group-hover:scale-110 transition">
                                <i class="fas fa-play"></i>
                            </div>
                        </div>
                    @else
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    @endif

                    <a href="{{ asset('storage/' . $item->gambar) }}" target="_blank" class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity"></a>
                </div>
                
                <div class="p-5">
                    <div class="flex justify-between items-center mb-2">
                        <span class="px-3 py-1 bg-amber-100 text-amber-700 text-[10px] font-bold rounded-full uppercase tracking-wider">
                            {{ $item->kategori }}
                        </span>
                        <span class="text-gray-400 text-xs">
                            <i class="far fa-calendar-alt mr-1"></i> {{ $item->created_at->format('d M Y') }}
                        </span>
                    </div>
                    <h3 class="text-gray-800 font-bold text-lg line-clamp-1">{{ $item->judul }}</h3>
                </div>
            </div>
        @empty
            <div class="col-span-full flex flex-col items-center justify-center py-20 bg-white rounded-xl border border-gray-100 shadow-sm">
                <div class="w-32 h-32 bg-gray-50 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-video-slash text-4xl text-gray-300" id="emptyIcon"></i>
                </div>
                <h2 class="text-2xl font-bold text-gray-700 mb-2" id="emptyTitle">Belum Ada Data</h2>
                <p class="text-gray-400 text-center px-6">Galeri akan muncul di sini setelah data ditambahkan.</p>
            </div>
        @endforelse
    </div>

    <div id="notFound" class="hidden text-center py-20 bg-white rounded-xl border border-gray-100 shadow-sm">
        <i class="fas fa-search-minus text-5xl text-gray-200 mb-4"></i>
        <h3 class="text-xl font-bold text-gray-700">Hasil Tidak Ditemukan</h3>
        <p class="text-gray-400">Coba gunakan kata kunci lain.</p>
    </div>
</div>

<style>
    .filter-type-btn.active {
        background-color: #B29156; /* Warna cokelat sesuai gambar */
        color: white;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }
    .filter-type-btn:not(.active):hover {
        background-color: #e5e7eb;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const categoryFilter = document.getElementById('categoryFilter');
        const typeBtns = document.querySelectorAll('.filter-type-btn');
        const items = document.querySelectorAll('.galeri-item');
        const notFound = document.getElementById('notFound');
        const galeriGrid = document.getElementById('galeriGrid');

        function applyFilters() {
            const searchTerm = searchInput.value.toLowerCase();
            const selectedCategory = categoryFilter.value.toUpperCase();
            const selectedType = document.querySelector('.filter-type-btn.active').getAttribute('data-type').toLowerCase();
            
            let visibleCount = 0;

            items.forEach(item => {
                const itemType = item.getAttribute('data-type');
                const itemCategory = item.getAttribute('data-category');
                const itemTitle = item.getAttribute('data-title');
                
                const matchesType = (selectedType === 'all' || itemType === selectedType);
                const matchesCategory = (selectedCategory === 'ALL' || itemCategory === selectedCategory);
                const matchesSearch = itemTitle.includes(searchTerm);

                if (matchesType && matchesCategory && matchesSearch) {
                    item.style.display = 'block';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });

            if (visibleCount === 0) {
                notFound.classList.remove('hidden');
                galeriGrid.style.display = 'none';
            } else {
                notFound.classList.add('hidden');
                galeriGrid.style.display = 'grid';
            }
        }

        // Search listener
        searchInput.addEventListener('input', applyFilters);

        // Category listener
        categoryFilter.addEventListener('change', applyFilters);

        // Type (Foto/Video) listener
        typeBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                typeBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                applyFilters();
            });
        });
    });
</script>
@endsection