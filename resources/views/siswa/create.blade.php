@extends('layouts.app')
@php $pageTitle = 'Tambah Siswa'; @endphp

@section('content')
    <div class="rounded-3xl border border-slate-200 bg-white p-6 max-w-4xl">
        <form method="POST" action="{{ route('siswa.store') }}">
            @include('siswa._form', ['item' => null])
        </form>
    </div>
@endsection
