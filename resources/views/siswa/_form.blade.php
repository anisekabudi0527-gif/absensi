@csrf

<div class="grid grid-cols-12 gap-4">
    <div class="col-span-12 md:col-span-4">
        <div class="text-sm text-slate-600">NIS</div>
        <input name="nis" value="{{ old('nis', $item->nis ?? '') }}"
            class="mt-1 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3" required>
        @error('nis')
            <div class="text-xs text-rose-600 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-span-12 md:col-span-8">
        <div class="text-sm text-slate-600">Nama</div>
        <input name="nama" value="{{ old('nama', $item->nama ?? '') }}"
            class="mt-1 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3" required>
        @error('nama')
            <div class="text-xs text-rose-600 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-span-12 md:col-span-4">
        <div class="text-sm text-slate-600">Jenis Kelamin</div>
        <select name="jenis_kelamin" class="mt-1 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
            <option value="">-</option>
            <option value="L" @selected(old('jenis_kelamin', $item->jenis_kelamin ?? '') === 'L')>L</option>
            <option value="P" @selected(old('jenis_kelamin', $item->jenis_kelamin ?? '') === 'P')>P</option>
        </select>
        @error('jenis_kelamin')
            <div class="text-xs text-rose-600 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-span-12 md:col-span-4">
        <div class="text-sm text-slate-600">Telepon (opsional)</div>
        <input name="telepon" value="{{ old('telepon', $item->telepon ?? '') }}"
            class="mt-1 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
        @error('telepon')
            <div class="text-xs text-rose-600 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-span-12 md:col-span-4">
        <div class="text-sm text-slate-600">Aktif</div>
        <label class="mt-2 inline-flex items-center gap-2">
            <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $item->is_active ?? true) ? true : false)>
            <span class="text-sm text-slate-700">Ya</span>
        </label>
    </div>

    <div class="col-span-12">
        <div class="text-sm text-slate-600">Alamat (opsional)</div>
        <textarea name="alamat" rows="3" class="mt-1 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">{{ old('alamat', $item->alamat ?? '') }}</textarea>
        @error('alamat')
            <div class="text-xs text-rose-600 mt-1">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="mt-6 rounded-2xl border border-slate-200 bg-slate-50 p-5">
    <div class="font-semibold">Data Wali (Opsional)</div>
    <div class="text-xs text-slate-500 mt-1">
        Pilih wali yang sudah ada, atau isi data wali baru. Jika diisi data baru, sistem akan otomatis membuat wali.
    </div>

    <div class="grid grid-cols-12 gap-4 mt-4">
        <div class="col-span-12">
            <div class="text-sm text-slate-600">Pilih Wali (jika sudah ada)</div>
            <select name="wali_id" class="mt-1 w-full rounded-2xl border border-slate-200 bg-white px-4 py-3">
                <option value="">- Tidak memilih / input baru -</option>
                @foreach ($waliList as $w)
                    <option value="{{ $w->id }}" @selected(old('wali_id', $item->wali_id ?? '') == $w->id)>
                        {{ $w->nama }} {{ $w->telepon ? '• ' . $w->telepon : '' }}
                    </option>
                @endforeach
            </select>
            @error('wali_id')
                <div class="text-xs text-rose-600 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-span-12 md:col-span-6">
            <div class="text-sm text-slate-600">Nama Wali (untuk input baru)</div>
            <input name="wali_nama" value="{{ old('wali_nama', $item?->wali?->nama ?? '') }}"
                class="mt-1 w-full rounded-2xl border border-slate-200 bg-white px-4 py-3"
                placeholder="Nama orang tua / wali">
            @error('wali_nama')
                <div class="text-xs text-rose-600 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-span-12 md:col-span-6">
            <div class="text-sm text-slate-600">Telepon Wali</div>
            <input name="wali_telepon" value="{{ old('wali_telepon', $item?->wali?->telepon ?? '') }}"
                class="mt-1 w-full rounded-2xl border border-slate-200 bg-white px-4 py-3" placeholder="08xxxx">
            @error('wali_telepon')
                <div class="text-xs text-rose-600 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-span-12 md:col-span-6">
            <div class="text-sm text-slate-600">Email Wali (opsional)</div>
            <input name="wali_email" value="{{ old('wali_email', $item?->wali?->email ?? '') }}"
                class="mt-1 w-full rounded-2xl border border-slate-200 bg-white px-4 py-3" placeholder="wali@email.com">
            @error('wali_email')
                <div class="text-xs text-rose-600 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-span-12 md:col-span-6">
            <div class="text-sm text-slate-600">Alamat Wali (opsional)</div>
            <input name="wali_alamat" value="{{ old('wali_alamat', $item?->wali?->alamat ?? '') }}"
                class="mt-1 w-full rounded-2xl border border-slate-200 bg-white px-4 py-3" placeholder="Alamat singkat">
            @error('wali_alamat')
                <div class="text-xs text-rose-600 mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- Opsional: kalau edit siswa, bisa update data wali lama --}}
        @if (isset($item) && $item?->wali_id)
            <div class="col-span-12">
                <label class="inline-flex items-center gap-2 mt-1">
                    <input type="checkbox" name="update_wali" value="1" @checked(old('update_wali'))>
                    <span class="text-sm text-slate-700">
                        Update data wali yang terhubung (jika saya ubah field wali di atas)
                    </span>
                </label>
            </div>
        @endif
    </div>
</div>

<div class="flex gap-2 mt-6">
    <button class="rounded-2xl bg-indigo-950 text-white px-5 py-3 hover:bg-indigo-900">
        Simpan
    </button>
    <a href="{{ route('siswa.index') }}"
        class="rounded-2xl border border-slate-200 bg-white px-5 py-3 hover:bg-slate-50">
        Batal
    </a>
</div>
