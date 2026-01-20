<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login - Absensi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50">
    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-md">
            <div class="bg-white border border-slate-200 shadow-sm rounded-3xl p-7">
                <div class="rounded-2xl bg-indigo-950 text-white p-5 mb-6">
                    <div class="text-sm opacity-80">Sistem</div>
                    <div class="text-2xl font-extrabold">Absensi Harian</div>
                    <div class="text-xs mt-1 opacity-80">1 kelas • per hari</div>
                </div>

                @if (session('error'))
                    <div class="rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 px-4 py-3 mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login.store') }}" class="space-y-4">
                    @csrf
                    <div>
                        <label class="text-sm text-slate-600">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="mt-1 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-200"
                            placeholder="nama@email.com" required>
                        @error('email')
                            <div class="text-xs text-rose-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label class="text-sm text-slate-600">Password</label>
                        <input type="password" name="password"
                            class="mt-1 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-200"
                            placeholder="••••••••" required>
                        @error('password')
                            <div class="text-xs text-rose-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="w-full rounded-2xl bg-indigo-950 text-white py-3 font-semibold hover:bg-indigo-900">
                        Login
                    </button>
                </form>
            </div>

            <div class="text-center text-xs text-slate-500 mt-4">
                Gunakan akun wali kelas / sekretaris yang sudah dibuat admin.
            </div>
        </div>
    </div>
</body>

</html>
