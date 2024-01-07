<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ElectricProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $products = public_path('products.csv');
        $data = array_map('str_getcsv', file($products));
        $headers = array_shift($data);

        foreach ($data as $row) {
            $productData = array_combine($headers, $row);
            Product::create([
                'name' => $productData['name'],
                'price' => $productData['price'],
                'quantity' => $productData['quantity'],
                'status' => $productData['status'],
            ]);
        }
    }
}
