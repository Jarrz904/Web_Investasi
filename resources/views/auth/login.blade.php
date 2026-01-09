@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-[#1a1a1a] relative overflow-hidden">
    <div class="absolute top-0 right-0 -mt-20 -mr-20 w-[500px] h-[500px] bg-[#8D734B]/20 rounded-full blur-[120px]"></div>
    <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-[400px] h-[400px] bg-white/5 rounded-full blur-[100px]"></div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-md mx-auto">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-black text-white tracking-tighter uppercase">Portal Investasi</h2>
                <p class="text-white/60 mt-2 font-medium">Silakan masuk ke akun Anda</p>
            </div>

            <div class="bg-white/95 backdrop-blur-xl p-8 rounded-[2.5rem] shadow-[0_35px_60px_-15px_rgba(0,0,0,0.5)] border border-white/20">
                <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div class="space-y-2">
                        <label class="text-xs font-black text-gray-700 uppercase tracking-widest ml-1">Alamat Email</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-4 flex items-center text-[#8D734B]">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                   class="w-full pl-12 pr-4 py-4 bg-gray-50 border border-gray-200 rounded-2xl text-gray-700 focus:ring-2 focus:ring-[#8D734B] focus:outline-none font-bold transition-all"
                                   placeholder="nama@email.com">
                        </div>
                        @error('email')
                            <span class="text-red-500 text-xs font-bold mt-1 ml-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-black text-gray-700 uppercase tracking-widest ml-1">Password</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-4 flex items-center text-[#8D734B]">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input type="password" name="password" required
                                   class="w-full pl-12 pr-4 py-4 bg-gray-50 border border-gray-200 rounded-2xl text-gray-700 focus:ring-2 focus:ring-[#8D734B] focus:outline-none font-bold transition-all"
                                   placeholder="••••••••">
                        </div>
                    </div>

                    <div class="flex items-center justify-between px-1">
                        <label class="flex items-center gap-2 cursor-pointer group">
                            <input type="checkbox" name="remember" class="w-4 h-4 rounded text-[#8D734B] focus:ring-[#8D734B] border-gray-300">
                            <span class="text-xs font-bold text-gray-500 group-hover:text-gray-700 transition-colors">Ingat Saya</span>
                        </label>
                        <a href="#" class="text-xs font-black text-[#8D734B] hover:underline uppercase tracking-tighter">Lupa Password?</a>
                    </div>

                    <button type="submit" 
                            class="w-full bg-[#8D734B] hover:bg-amber-900 text-white py-5 rounded-2xl font-black transition-all duration-300 shadow-xl shadow-[#8D734B]/30 uppercase tracking-[0.2em] text-sm transform active:scale-95 flex items-center justify-center gap-3 mt-4">
                        Masuk <i class="fas fa-arrow-right text-xs"></i>
                    </button>
                </form>
            </div>

            <p class="text-center mt-8 text-white/50 text-sm font-medium">
                Belum punya akun? 
                <a href="#" class="text-white font-black hover:text-[#8D734B] transition-colors underline">Daftar Sekarang</a>
            </p>
        </div>
    </div>
</div>
@endsection