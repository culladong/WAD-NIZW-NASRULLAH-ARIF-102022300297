<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'nama_kategori' => 'Elektronik',
                'deskripsi' => 'Peralatan elektronik gudang',
            ],
            [
                'nama_kategori' => 'Peralatan Gudang',
                'deskripsi' => 'Peralatan operasional gudang',
            ],
            [
                'nama_kategori' => 'Alat Tulis Kantor',
                'deskripsi' => 'Perlengkapan administrasi',
            ],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['nama_kategori' => $category['nama_kategori']],
                ['deskripsi' => $category['deskripsi']]
            );
        }
    }
}
