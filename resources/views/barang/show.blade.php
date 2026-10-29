@extends('layouts.app')

@section('title', 'Detail Barang')

@section('content')
<div class="card">
    <div class="toolbar">
        <h2>Detail Barang</h2>

        <a
            href="{{ route('barang.edit', $barang) }}"
            class="btn btn-warning"
        >
            Edit Barang
        </a>
    </div>

    <div class="detail-row">
        <strong>Kode Barang</strong>
        {{ $barang->kode_barang }}
    </div>

    <div class="detail-row">
        <strong>Nama Barang</strong>
        {{ $barang->nama_barang }}
    </div>

    <div class="detail-row">
        <strong>Kategori</strong>
        {{ $barang->category->nama_kategori }}
    </div>

    <div class="detail-row">
        <strong>Spesifikasi Teknis</strong>
        {{ $barang->spesifikasi_teknis ?: '-' }}
    </div>

    <div class="detail-row">
        <strong>Satuan</strong>
        {{ $barang->satuan }}
    </div>

    <div class="detail-row">
        <strong>Stok</strong>
        {{ $barang->stok }}
    </div>

    <div class="detail-row">
        <strong>Dibuat pada</strong>
        {{ $barang->created_at->format('d-m-Y H:i') }}
    </div>

    <div style="margin-top: 20px;">
        <a href="{{ route('barang.index') }}" class="btn btn-secondary">
            Kembali ke Katalog
        </a>
    </div>
</div>
@endsection
