<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ $title ?? 'Absensi Kelas' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50 text-slate-900">
    <div class="min-h-screen flex">

        {{-- SIDEBAR --}}
        <aside class="w-72 bg-white border-r border-slate-200">
            <div class="p-5">
                <div class="rounded-2xl bg-indigo-950 text-white p-4">
                    <div class="text-sm opacity-90">Sistem</div>
                    <div class="text-xl font-extrabold leading-tight">Absensi Harian</div>
                    <div class="text-xs mt-2 opacity-80">
                        {{ auth()->user()->name }}
                    </div>
                </div>
            </div>

            <nav class="px-3 pb-6 space-y-1">
                <a href="{{ route('dashboard') }}"
                    class="flex items-center gap-3 rounded-xl px-4 py-2.5 hover:bg-slate-100 {{ request()->routeIs('dashboard') ? 'bg-slate-100 font-semibold' : '' }}">
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('absensi.index') }}"
                    class="flex items-center gap-3 rounded-xl px-4 py-2.5 hover:bg-slate-100 {{ request()->routeIs('absensi.*') ? 'bg-slate-100 font-semibold' : '' }}">
                    <span>Absensi</span>
                </a>

                <a href="{{ route('rekap.index') }}"
                    class="flex items-center gap-3 rounded-xl px-4 py-2.5 hover:bg-slate-100 {{ request()->routeIs('rekap.*') ? 'bg-slate-100 font-semibold' : '' }}">
                    <span>Rekap</span>
                </a>

                @if (auth()->user()->role === 'wali_kelas')
                    <div class="pt-2 mt-2 border-t border-slate-200"></div>

                    <a href="{{ route('siswa.index') }}"
                        class="flex items-center gap-3 rounded-xl px-4 py-2.5 hover:bg-slate-100 {{ request()->routeIs('siswa.*') ? 'bg-slate-100 font-semibold' : '' }}">
                        <span>Data Siswa</span>
                    </a>

                    <a href="{{ route('pengurus.index') }}"
                        class="flex items-center gap-3 rounded-xl px-4 py-2.5 hover:bg-slate-100 {{ request()->routeIs('pengurus.*') ? 'bg-slate-100 font-semibold' : '' }}">
                        <span>Pengurus Kelas</span>
                    </a>

                    <a href="{{ route('settings.index') }}"
                        class="flex items-center gap-3 rounded-xl px-4 py-2.5 hover:bg-slate-100 {{ request()->routeIs('settings.*') ? 'bg-slate-100 font-semibold' : '' }}">
                        <span>Settings</span>
                    </a>
                @endif
            </nav>
        </aside>

        {{-- MAIN --}}
        <main class="flex-1 flex flex-col">
            {{-- TOPBAR --}}
            <header class="bg-white border-b border-slate-200">
                <div class="px-6 py-4 flex items-center justify-between">
                    <div>
                        <div class="text-sm text-slate-500">{{ now()->format('d M Y') }}</div>
                        <h1 class="text-xl font-bold">{{ $pageTitle ?? 'Dashboard' }}</h1>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="rounded-xl bg-indigo-950 text-white px-4 py-2 hover:bg-indigo-900">
                            Logout
                        </button>
                    </form>
                </div>
            </header>

            {{-- FLASH --}}
            <div class="px-6 pt-5">
                @if (session('success'))
                    <div class="rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 px-4 py-3">
                        {{ session('error') }}
                    </div>
                @endif
            </div>

            {{-- CONTENT --}}
            <div class="px-6 py-6 flex-1">
                @yield('content')
            </div>

            {{-- <footer class="border-t border-slate-200 bg-white">
                <div class="px-6 py-4 text-sm text-slate-500">

                </div>
            </footer> --}}
        </main>

    </div>
</body>

</html>
