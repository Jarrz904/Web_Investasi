@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

<div class="flex flex-col lg:flex-row h-[calc(100vh-80px)] overflow-hidden">
    <div class="w-full lg:w-80 bg-white border-r border-gray-200 flex flex-col shadow-lg z-[1000]">
        <div class="flex border-b">
            <button id="tab-layer" class="flex-1 py-4 text-sm font-bold border-b-2 border-amber-600 text-amber-600 transition" onclick="switchTab('layer')">
                Layer
            </button>
            <button id="tab-filter" class="flex-1 py-4 text-sm font-bold border-b-2 border-gray-200 text-gray-500 hover:text-amber-600 transition" onclick="switchTab('filter')">
                Filter
            </button>
        </div>

        <div class="flex-1 overflow-y-auto custom-scrollbar">
            
            <div id="panel-layer" class="p-5 space-y-4">
                <div class="space-y-3">
                    <label class="flex items-center gap-3 p-2 hover:bg-gray-50 rounded-lg cursor-pointer transition">
                        <input type="checkbox" class="w-4 h-4 accent-amber-600" checked>
                        <span class="text-sm text-gray-700">Rencana Detail Tata Ruang</span>
                    </label>
                    
                    <div class="space-y-1">
                        <label class="flex items-center justify-between p-2 hover:bg-gray-50 rounded-lg cursor-pointer transition">
                            <div class="flex items-center gap-3">
                                <input type="checkbox" class="w-4 h-4 accent-amber-600" checked onchange="toggleMarkers(this)">
                                <span class="text-sm text-gray-700 font-medium">Proyek Investasi</span>
                            </div>
                            <i class="fas fa-chevron-down text-xs text-gray-400"></i>
                        </label>
                        </div>

                    <div class="space-y-1">
                        <label class="flex items-center justify-between p-2 hover:bg-gray-50 rounded-lg cursor-pointer transition">
                            <div class="flex items-center gap-3">
                                <input type="checkbox" class="w-4 h-4 accent-amber-600">
                                <span class="text-sm text-gray-700">Potensi Investasi</span>
                            </div>
                            <i class="fas fa-chevron-down text-xs text-gray-400"></i>
                        </label>
                    </div>

                    <label class="flex items-center gap-3 p-2 hover:bg-gray-50 rounded-lg cursor-pointer transition">
                        <input type="checkbox" class="w-4 h-4 accent-amber-600">
                        <span class="text-sm text-gray-700">Demografi Kabupaten Tegal</span>
                    </label>

                    <div class="space-y-1">
                        <label class="flex items-center justify-between p-2 hover:bg-gray-50 rounded-lg cursor-pointer transition">
                            <div class="flex items-center gap-3">
                                <input type="checkbox" class="w-4 h-4 accent-amber-600">
                                <span class="text-sm text-gray-700">Fasilitas Umum</span>
                            </div>
                            <i class="fas fa-chevron-up text-xs text-gray-400"></i>
                        </label>
                    </div>
                </div>
            </div>

            <div id="panel-filter" class="hidden p-5 space-y-6">
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-2 tracking-wider">Sektor</label>
                    <select id="filterSektor" class="w-full p-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:ring-amber-500 focus:border-amber-500 outline-none">
                        <option value="">Semua Sektor</option>
                        @foreach($semuaSektor as $sektor)
                            <option value="{{ $sektor->id }}">{{ $sektor->nama_sektor }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-2 tracking-wider">Lokasi (Kecamatan)</label>
                    <select id="filterKecamatan" class="w-full p-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:ring-amber-500 focus:border-amber-500 outline-none">
                        <option value="">Semua Lokasi</option>
                        @foreach($semuaKecamatan as $kec)
                            <option value="{{ $kec->id }}">{{ $kec->nama_kecamatan }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-2 tracking-wider">Kategori</label>
                    <select id="filterKategori" class="w-full p-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:ring-amber-500 focus:border-amber-500 outline-none">
                        <option value="">Semua Kategori</option>
                        <option value="Strategis">Strategis</option>
                        <option value="Prospektif">Prospektif</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-2 tracking-wider">Nilai Investasi</label>
                    <div class="px-2">
                        <input type="range" id="investasiRange" min="0" max="1000000000000" step="1000000000" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-amber-600">
                        <div class="flex justify-between mt-2 text-[10px] text-gray-400 font-bold uppercase">
                            <span>Rp 0</span>
                            <span id="rangeVal">Rp 1 T</span>
                        </div>
                    </div>
                </div>
                
                <button onclick="applyFilters()" class="w-full bg-[#8D734B] hover:bg-amber-800 text-white py-3 rounded-xl font-bold text-sm shadow-md transition-all active:scale-95">
                    TERAPKAN FILTER
                </button>
            </div>

        </div>
    </div>

    <div class="flex-1 relative">
        <div id="map" class="w-full h-full"></div>
        
        <div class="absolute top-5 right-5 z-[1000] flex flex-col gap-2">
            <button onclick="resetMap()" class="bg-white p-3 rounded-lg shadow-xl hover:bg-gray-50 text-[#1d76b1] font-bold text-xs flex items-center gap-2">
                <i class="fas fa-undo"></i> Reset View
            </button>
            <button onclick="toggleFullscreen()" class="bg-white p-3 rounded-lg shadow-xl hover:bg-gray-50 text-[#1d76b1] font-bold text-xs flex items-center gap-2">
                <i class="fas fa-expand"></i> Fullscreen
            </button>
        </div>
    </div>
</div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    // 1. Inisialisasi Peta
    var map = L.map('map', {
        zoomControl: false 
    }).setView([-7.02, 109.15], 11);

    L.control.zoom({ position: 'topleft' }).addTo(map);

    var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    // 2. Data & Markers
    var dataPeluang = @json($semuaPeluang);
    var markersLayer = L.layerGroup().addTo(map);

    function renderMarkers(data) {
        markersLayer.clearLayers();
        data.forEach(function(item) {
            if(item.lat && item.lng) {
                var marker = L.marker([item.lat, item.lng]);
                
                var popupContent = `
                    <div class="p-2 min-w-[200px]">
                        <h3 class="font-bold text-amber-800 text-sm mb-1">${item.nama_proyek}</h3>
                        <p class="text-[10px] text-gray-500 mb-2 leading-tight">
                            <i class="fas fa-map-marker-alt"></i> ${item.lokasi || 'Kab. Tegal'}
                        </p>
                        <p class="text-xs font-bold text-gray-800 mb-3">
                            ${item.format_rupiah || 'Rp ' + new Intl.NumberFormat('id-ID').format(item.nilai_investasi)}
                        </p>
                        <a href="/peluang/${item.id}" class="block text-center bg-[#8D734B] text-white text-[10px] py-1.5 rounded uppercase font-bold tracking-tighter">Lihat Detail</a>
                    </div>
                `;
                
                marker.bindPopup(popupContent);
                markersLayer.addLayer(marker);
            }
        });
    }

    renderMarkers(dataPeluang);

    // 3. Tab Switching Logic
    function switchTab(type) {
        const panelLayer = document.getElementById('panel-layer');
        const panelFilter = document.getElementById('panel-filter');
        const tabLayer = document.getElementById('tab-layer');
        const tabFilter = document.getElementById('tab-filter');

        if (type === 'layer') {
            panelLayer.classList.remove('hidden');
            panelFilter.classList.add('hidden');
            tabLayer.classList.add('border-amber-600', 'text-amber-600');
            tabLayer.classList.remove('border-gray-200', 'text-gray-500');
            tabFilter.classList.remove('border-amber-600', 'text-amber-600');
            tabFilter.classList.add('border-gray-200', 'text-gray-500');
        } else {
            panelLayer.classList.add('hidden');
            panelFilter.classList.remove('hidden');
            tabFilter.classList.add('border-amber-600', 'text-amber-600');
            tabFilter.classList.remove('border-gray-200', 'text-gray-500');
            tabLayer.classList.remove('border-amber-600', 'text-amber-600');
            tabLayer.classList.add('border-gray-200', 'text-gray-500');
        }
    }

    // 4. Layer Toggle Marker
    function toggleMarkers(checkbox) {
        if (checkbox.checked) {
            map.addLayer(markersLayer);
        } else {
            map.removeLayer(markersLayer);
        }
    }

    // 5. Filter Logic
    function applyFilters() {
        var sektorId = document.getElementById('filterSektor').value;
        var kecId = document.getElementById('filterKecamatan').value;
        var kategori = document.getElementById('filterKategori').value;
        var maxInvestasi = document.getElementById('investasiRange').value;

        var filtered = dataPeluang.filter(function(item) {
            var matchSektor = !sektorId || item.sektor_id == sektorId;
            var matchKec = !kecId || item.kecamatan_id == kecId;
            var matchKategori = !kategori || item.status == kategori;
            var matchInvestasi = item.nilai_investasi <= maxInvestasi;

            return matchSektor && matchKec && matchKategori && matchInvestasi;
        });

        renderMarkers(filtered);
        
        if(filtered.length > 0) {
            var group = new L.featureGroup(markersLayer.getLayers());
            map.fitBounds(group.getBounds(), {padding: [50, 50]});
        }
    }

    // 6. UI Helpers
    function resetMap() {
        map.setView([-7.02, 109.15], 11);
    }

    function toggleFullscreen() {
        var mapContainer = document.querySelector('.flex-1.relative');
        if (!document.fullscreenElement) {
            mapContainer.requestFullscreen();
        } else {
            document.exitFullscreen();
        }
    }

    document.getElementById('investasiRange').addEventListener('input', function(e) {
        var val = e.target.value;
        if (val >= 1000000000000) {
            document.getElementById('rangeVal').innerText = "Rp 1 T+";
        } else {
            document.getElementById('rangeVal').innerText = "Rp " + (val / 1000000000).toFixed(0) + " M";
        }
    });
</script>

<style>
    .leaflet-popup-content-wrapper { border-radius: 12px; padding: 0; overflow: hidden; }
    .leaflet-popup-content { margin: 0; }
    
    .custom-scrollbar::-webkit-scrollbar { width: 4px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: #f1f1f1; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #8D734B; border-radius: 10px; }

    /* Mencegah konten meluap saat fullscreen */
    :fullscreen #map { height: 100% !important; width: 100% !important; }
</style>
@endsection