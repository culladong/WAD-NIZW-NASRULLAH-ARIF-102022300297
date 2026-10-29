<div class="form-group">
    <label for="kode_barang">Kode Barang *</label>
    <input
        type="text"
        id="kode_barang"
        name="kode_barang"
        value="{{ old('kode_barang', isset($barang) ? $barang->kode_barang : '') }}"
        maxlength="50"
        required
    >
    @error('kode_barang')
        <div class="error-text">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="nama_barang">Nama Barang *</label>
    <input
        type="text"
        id="nama_barang"
        name="nama_barang"
        value="{{ old('nama_barang', isset($barang) ? $barang->nama_barang : '') }}"
        required
    >
    @error('nama_barang')
        <div class="error-text">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="category_id">Kategori *</label>
    <select id="category_id" name="category_id" required>
        <option value="">-- Pilih Kategori --</option>

        @foreach ($categories as $category)
            <option
                value="{{ $category->id }}"
                @selected((string) old(
                    'category_id',
                    isset($barang) ? $barang->category_id : ''
                ) === (string) $category->id)
            >
                {{ $category->nama_kategori }}
            </option>
        @endforeach
    </select>
    @error('category_id')
        <div class="error-text">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="spesifikasi_teknis">Spesifikasi Teknis</label>
    <textarea
        id="spesifikasi_teknis"
        name="spesifikasi_teknis"
    >{{ old('spesifikasi_teknis', isset($barang) ? $barang->spesifikasi_teknis : '') }}</textarea>
    @error('spesifikasi_teknis')
        <div class="error-text">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="satuan">Satuan *</label>
    <select id="satuan" name="satuan" required>
        <option value="">-- Pilih Satuan --</option>

        @foreach (['pcs', 'unit', 'buah', 'set', 'box', 'meter', 'kg', 'liter'] as $satuan)
            <option
                value="{{ $satuan }}"
                @selected(old(
                    'satuan',
                    isset($barang) ? $barang->satuan : ''
                ) === $satuan)
            >
                {{ $satuan }}
            </option>
        @endforeach
    </select>
    @error('satuan')
        <div class="error-text">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="stok">Stok *</label>
    <input
        type="number"
        id="stok"
        name="stok"
        min="0"
        value="{{ old('stok', isset($barang) ? $barang->stok : 0) }}"
        required
    >
    @error('stok')
        <div class="error-text">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-success">
    {{ $submitLabel }}
</button>

<a href="{{ route('barang.index') }}" class="btn btn-secondary">
    Kembali
</a>
