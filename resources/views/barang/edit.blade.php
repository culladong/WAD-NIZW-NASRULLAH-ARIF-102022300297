@extends('layouts.app')

@section('title', 'Edit Barang')

@section('content')
<div class="card">
    <h2>Edit Barang</h2>
    <p>Perbarui informasi barang yang dipilih.</p>

    <form
        action="{{ route('barang.update', $barang) }}"
        method="POST"
    >
        @csrf
        @method('PUT')

        @include('barang._form', [
            'submitLabel' => 'Simpan Perubahan'
        ])
    </form>
</div>
@endsection
