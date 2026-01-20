@extends('layouts.app')
@php $pageTitle = 'Edit Pengurus'; @endphp

@section('content')
    <div class="rounded-3xl border border-slate-200 bg-white p-6 max-w-4xl">
        <form method="POST" action="{{ route('pengurus.update', $item) }}">
            @method('PUT')
            @include('pengurus._form', ['item' => $item])
        </form>
    </div>
@endsection
