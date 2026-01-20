@csrf

<div class="grid grid-cols-12 gap-4">
    <div class="col-span-12 md:col-span-6">
        <div class="text-sm text-slate-600">Siswa</div>
        <select name="siswa_id" class="mt-1 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3" required>
            <option value="">Pilih siswa...</option>
            @foreach ($siswaList as $s)
                <option value="{{ $s->id }}" @selected(old('siswa_id', $item->siswa_id ?? '') == $s->id)>
                    {{ $s->nis }} - {{ $s->nama }}
                </option>
            @endforeach
        </select>
        @error('siswa_id')
            <div class="text-xs text-rose-600 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-span-12 md:col-span-6">
        <div class="text-sm text-slate-600">Jabatan</div>
        <input name="jabatan" value="{{ old('jabatan', $item->jabatan ?? '') }}" placeholder="contoh: sekretaris"
            class="mt-1 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3" required>
        @error('jabatan')
            <div class="text-xs text-rose-600 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-span-12 md:col-span-6">
        <div class="text-sm text-slate-600">Periode Awal</div>
        <input type="date" name="periode_awal"
            value="{{ old('periode_awal', optional($item->periode_awal ?? null)->format('Y-m-d')) }}"
            class="mt-1 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3" required>
        @error('periode_awal')
            <div class="text-xs text-rose-600 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-span-12 md:col-span-6">
        <div class="text-sm text-slate-600">Periode Akhir (opsional)</div>
        <input type="date" name="periode_akhir"
            value="{{ old('periode_akhir', optional($item->periode_akhir ?? null)->format('Y-m-d')) }}"
            class="mt-1 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
        @error('periode_akhir')
            <div class="text-xs text-rose-600 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-span-12">
        <div class="text-sm text-slate-600">Tugas (opsional)</div>
        <textarea name="tugas" rows="3" class="mt-1 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">{{ old('tugas', $item->tugas ?? '') }}</textarea>
        @error('tugas')
            <div class="text-xs text-rose-600 mt-1">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="flex gap-2 mt-6">
    <button class="rounded-2xl bg-indigo-950 text-white px-5 py-3 hover:bg-indigo-900">Simpan</button>
    <a href="{{ route('pengurus.index') }}"
        class="rounded-2xl border border-slate-200 bg-white px-5 py-3 hover:bg-slate-50">Batal</a>
</div>
