<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::with('category')
            ->latest()
            ->paginate(10);

        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        $categories = Category::orderBy('nama_kategori')->get();

        return view('barang.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_barang' => [
                'required',
                'string',
                'max:50',
                'unique:barangs,kode_barang',
            ],
            'nama_barang' => ['required', 'string', 'max:255'],
            'category_id' => [
                'required',
                'integer',
                'exists:categories,id',
            ],
            'spesifikasi_teknis' => ['nullable', 'string'],
            'satuan' => ['required', 'string', 'max:30'],
            'stok' => ['required', 'integer', 'min:0'],
        ]);

        Barang::create($validated);

        return redirect()
            ->route('barang.index')
            ->with('success', 'Barang berhasil ditambahkan.');
    }

    public function show(Barang $barang)
    {
        $barang->load('category');

        return view('barang.show', compact('barang'));
    }

    public function edit(Barang $barang)
    {
        $categories = Category::orderBy('nama_kategori')->get();

        return view(
            'barang.edit',
            compact('barang', 'categories')
        );
    }

    public function update(Request $request, Barang $barang)
    {
        $validated = $request->validate([
            'kode_barang' => [
                'required',
                'string',
                'max:50',
                Rule::unique('barangs', 'kode_barang')
                    ->ignore($barang->id),
            ],
            'nama_barang' => ['required', 'string', 'max:255'],
            'category_id' => [
                'required',
                'integer',
                'exists:categories,id',
            ],
            'spesifikasi_teknis' => ['nullable', 'string'],
            'satuan' => ['required', 'string', 'max:30'],
            'stok' => ['required', 'integer', 'min:0'],
        ]);

        $barang->update($validated);

        return redirect()
            ->route('barang.index')
            ->with('success', 'Data barang berhasil diperbarui.');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();

        return redirect()
            ->route('barang.index')
            ->with('success', 'Barang berhasil dihapus.');
    }
}
