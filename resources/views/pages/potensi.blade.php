@extends('layouts.app')

@section('content')
<div class="bg-[#8D734B] py-16 text-center text-white">
    <h1 class="text-4xl font-bold uppercase tracking-widest">Potensi Daerah</h1>
    <p class="mt-2 opacity-80">Kekayaan Alam dan Sumber Daya Kabupaten Tegal</p>
</div>

<div class="container mx-auto py-12 px-4 md:px-10">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @forelse($semuaPotensi as $pt)
        <div class="group cursor-pointer">
            <div class="relative overflow-hidden rounded-lg shadow-lg">
                <img src="{{ asset('storage/'.$pt->gambar) }}" class="h-64 w-full object-cover group-hover:scale-110 transition duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex flex-col justify-end p-6">
                    <span class="text-amber-400 text-xs font-bold uppercase">{{ $pt->kategori }}</span>
                    <h3 class="text-white font-bold text-xl">{{ $pt->judul }}</h3>
                </div>
            </div>
        </div>
        @empty
        <p class="col-span-4 text-center text-gray-400">Data potensi belum tersedia.</p>
        @endforelse
    </div>
</div>
@endsection