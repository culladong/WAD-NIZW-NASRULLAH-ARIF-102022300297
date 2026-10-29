@extends('layouts.app')

@section('title', 'Katalog Barang')

@section('content')
<div class="card">
    <div class="toolbar">
        <div>
            <h2 style="margin: 0 0 8px;">Katalog Barang</h2>
            <p style="margin: 0; color: #64748b;">
                Daftar inventaris dan spesifikasi barang gudang.
            </p>
        </div>

        <a href="{{ route('barang.create') }}" class="btn btn-success">
            + Tambah Barang
        </a>
    </div>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Spesifikasi Teknis</th>
                    <th>Satuan</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($barangs as $barang)
                    <tr>
                        <td>
                            {{ $barangs->firstItem() + $loop->index }}
                        </td>
                        <td>{{ $barang->kode_barang }}</td>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->category->nama_kategori }}</td>
                        <td>
                            {{ $barang->spesifikasi_teknis ?: '-' }}
                        </td>
                        <td>{{ $barang->satuan }}</td>
                        <td>{{ $barang->stok }}</td>
                        <td>
                            <div class="actions">
                                <a
                                    href="{{ route('barang.show', $barang) }}"
                                    class="btn"
                                >Detail</a>

                                <a
                                    href="{{ route('barang.edit', $barang) }}"
                                    class="btn btn-warning"
                                >Edit</a>

                                <form
                                    action="{{ route('barang.destroy', $barang) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus barang ini?')"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger"
                                    >Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" style="text-align: center;">
                            Belum ada data barang. Klik Tambah Barang
                            untuk memasukkan data pertama.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination">
        {{ $barangs->links() }}
    </div>
</div>
@endsection
