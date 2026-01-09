<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Portal Investasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-[#f8f9fa] font-sans">

    <div class="flex min-h-screen" x-data="{ sidebarOpen: true }">
        <aside :class="sidebarOpen ? 'w-72' : 'w-20'" class="bg-[#1a1a1a] text-white transition-all duration-300 flex flex-col fixed h-full z-50">
            <div class="p-6 flex items-center gap-4 border-b border-white/5">
                <div class="w-10 h-10 bg-[#8D734B] rounded-xl flex items-center justify-center shrink-0">
                    <i class="fas fa-crown text-white"></i>
                </div>
                <span x-show="sidebarOpen" class="font-black tracking-tighter text-xl uppercase overflow-hidden whitespace-nowrap">Admin <span class="text-[#8D734B]">DPMPTSP</span></span>
            </div>

            <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
                <a href="#" class="flex items-center gap-4 px-4 py-3 bg-[#8D734B] text-white rounded-xl transition-all">
                    <i class="fas fa-th-large w-5 text-center text-lg"></i>
                    <span x-show="sidebarOpen" class="font-bold text-sm">Dashboard</span>
                </a>
                <a href="#" class="flex items-center gap-4 px-4 py-3 text-white/50 hover:bg-white/5 hover:text-white rounded-xl transition-all">
                    <i class="fas fa-city w-5 text-center text-lg"></i>
                    <span x-show="sidebarOpen" class="font-bold text-sm">Proyek Investasi</span>
                </a>
                <a href="#" class="flex items-center gap-4 px-4 py-3 text-white/50 hover:bg-white/5 hover:text-white rounded-xl transition-all">
                    <i class="fas fa-users w-5 text-center text-lg"></i>
                    <span x-show="sidebarOpen" class="font-bold text-sm">Investor</span>
                </a>
                <a href="#" class="flex items-center gap-4 px-4 py-3 text-white/50 hover:bg-white/5 hover:text-white rounded-xl transition-all">
                    <i class="fas fa-chart-pie w-5 text-center text-lg"></i>
                    <span x-show="sidebarOpen" class="font-bold text-sm">Laporan</span>
                </a>
            </nav>

            <div class="p-4 border-t border-white/5">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="w-full flex items-center gap-4 px-4 py-3 text-red-400 hover:bg-red-500/10 rounded-xl transition-all">
                        <i class="fas fa-sign-out-alt w-5 text-center text-lg"></i>
                        <span x-show="sidebarOpen" class="font-bold text-sm">Keluar</span>
                    </button>
                </form>
            </div>
        </aside>

        <main :class="sidebarOpen ? 'ml-72' : 'ml-20'" class="flex-1 transition-all duration-300">
            <header class="bg-white border-b border-gray-200 px-8 py-4 flex items-center justify-between sticky top-0 z-40">
                <button @click="sidebarOpen = !sidebarOpen" class="p-2 rounded-lg hover:bg-gray-100 transition-colors">
                    <i class="fas fa-bars text-gray-500"></i>
                </button>
                
                <div class="flex items-center gap-4">
                    <div class="text-right hidden md:block">
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest leading-none">Administrator</p>
                        <p class="text-sm font-black text-gray-800 uppercase">Super Admin</p>
                    </div>
                    <img src="https://ui-avatars.com/api/?name=Admin&background=8D734B&color=fff" class="w-10 h-10 rounded-full border-2 border-[#8D734B]/20">
                </div>
            </header>

            <div class="p-8">
                @yield('content')
            </div>
        </main>
    </div>

</body>
</html>