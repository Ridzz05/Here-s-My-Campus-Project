<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Supplier::create([
            'name' => 'PT. Sumber Makmur',
            'phone' => '081234567890',
            'address' => 'Jl. Merdeka No. 10, Jakarta'
        ]);

        \App\Models\Supplier::create([
            'name' => 'CV. Jaya Abadi',
            'phone' => '082233445566',
            'address' => 'Jl. Sudirman No. 25, Surabaya'
        ]);

        \App\Models\Supplier::create([
            'name' => 'UD. Maju Terus',
            'phone' => '083344556677',
            'address' => 'Jl. Thamrin No. 5, Bandung'
        ]);
    }
}
