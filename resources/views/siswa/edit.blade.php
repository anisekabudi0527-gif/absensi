@extends('layouts.app')
@php $pageTitle = 'Edit Siswa'; @endphp

@section('content')
<div class="rounded-3xl border border-slate-200 bg-white p-6 max-w-4xl">
  <form method="POST" action="{{ route('siswa.update', $siswa) }}">
    @method('PUT')
    @include('siswa._form', ['item' => $siswa])
  </form>
</div>
@endsection
