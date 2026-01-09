@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12 px-4 md:px-10">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        <div>
            <h2 class="text-3xl font-bold text-[#8D734B] mb-6">Hubungi Kami</h2>
            <p class="text-gray-600 mb-8">Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu (DPMPTSP) Kabupaten Tegal.</p>
            
            <div class="space-y-6">
                <div class="flex items-start gap-4">
                    <div class="bg-amber-100 p-3 rounded-lg text-[#8D734B]"><i class="fas fa-map-marker-alt"></i></div>
                    <div><h4 class="font-bold">Alamat</h4><p class="text-sm text-gray-500">Jl. Dr. Soetomo No. 1, Slawi, Jawa Tengah</p></div>
                </div>
                <div class="flex items-start gap-4">
                    <div class="bg-amber-100 p-3 rounded-lg text-[#8D734B]"><i class="fas fa-phone"></i></div>
                    <div><h4 class="font-bold">Telepon</h4><p class="text-sm text-gray-500">(0283) 491000</p></div>
                </div>
            </div>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100">
            <form action="#" method="POST" class="space-y-4">
                @csrf
                <div><label class="block text-sm font-bold text-gray-700">Nama Lengkap</label><input type="text" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#8D734B]"></div>
                <div><label class="block text-sm font-bold text-gray-700">Email</label><input type="email" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#8D734B]"></div>
                <div><label class="block text-sm font-bold text-gray-700">Pesan</label><textarea rows="4" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#8D734B]"></textarea></div>
                <button class="w-full bg-[#8D734B] text-white py-3 rounded-lg font-bold hover:bg-amber-800 transition uppercase tracking-widest">Kirim Pesan</button>
            </form>
        </div>
    </div>
</div>
@endsection