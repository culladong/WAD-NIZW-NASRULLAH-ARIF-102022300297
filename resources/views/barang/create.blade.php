@extends('layouts.app')

@section('title', 'Tambah Barang')

@section('content')
<div class="card">
    <h2>Tambah Barang</h2>
    <p>Masukkan informasi barang inventaris gudang.</p>

    <form action="{{ route('barang.store') }}" method="POST">
        @csrf

        @include('barang._form', [
            'submitLabel' => 'Simpan Barang'
        ])
    </form>
</div>
@endsection
