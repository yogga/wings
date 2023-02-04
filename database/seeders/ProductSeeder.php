<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
            [
                'product_code' => 'SKUSKILNP01',
                'product_name' => 'So Klin Pewangi',
                'price' => 17000,
                'currency' => 'IDR',
                'discount' => 10,
                'dimension' => '13cm X 10cm',
                'unit' => 'PCS',
            ],
            [
                'product_code' => 'SKUSKILNP02',
                'product_name' => 'Sabun Colek Wings',
                'price' => 12000,
                'currency' => 'IDR',
                'discount' => 0,
                'dimension' => '8cm X 8cm',
                'unit' => 'PCS',
            ],
            [
                'product_code' => 'SKUSKILNP03',
                'product_name' => 'So Klin Liquid',
                'price' => 15000,
                'currency' => 'IDR',
                'discount' => 0,
                'dimension' => '13cm X 10cm',
                'unit' => 'PCS',
            ],
            [
                'product_code' => 'SKUSKILNP04',
                'product_name' => 'Giv Biru',
                'price' => 12000,
                'currency' => 'IDR',
                'discount' => 0,
                'dimension' => '5cm X 5cm',
                'unit' => 'PCS',
            ],
        ]);
    }
}
