<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $products = [
            ['name' => 'Procesador Intel Core i7', 'description' => 'Procesador de 8 núcleos, 3.8 GHz', 'price' => 300, 'image' => 'img/procesadorIntel.jpg'],
            ['name' => 'Tarjeta madre ASUS', 'description' => 'Compatible con Intel, 4 slots de RAM', 'price' => 150, 'image' => 'img/tarjeta_madre_asus.jpg'],
            ['name' => 'RAM Kingston 8GB', 'description' => 'DDR4, 3200 MHz', 'price' => 60, 'image' => 'img/ram_kingston.jpg'],
            ['name' => 'SSD Samsung 1TB', 'description' => 'SSD, storage of 1TB', 'price' => 100, 'image' => 'img/ssd_samsung.jpg'],
            ['name' => 'NVIDIA GeForce RTX 3070', 'description' => '8GB GDDR6, Ray Tracing', 'price' => 500, 'image' => 'url'], 
            ['name' => 'Corsair 650W', 'description' => '80 Plus Gold, modular', 'price' => 100, 'image' => 'url'],
            ['name' => 'Dell UltraSharp 27" monitor', 'description' => '4K UHD, IPS, 60Hz', 'price' => 400, 'image' => 'url'],
            ['name' => 'Logitech G Pro', 'description' => 'RGB gaming mouse', 'price' => 130, 'image' => 'url'],
            ['name' => 'WebCam Logitech C920', 'description' => 'HD 1080p', 'price' => 80, 'image' => 'url'],
            ['name' => 'Laptop Dell XPS 15', 'description' => 'Intel Core i7, 16GB RAM, SSD 512GB, 4K UHD', 'price' => 1500, 'image' => 'url'],
        ];

        foreach ($products as $product) {
            DB::table('products')->insert([
                'name' => $product['name'],
                'description' => $product['description'],
                'price' => $product['price'],
                'image' => $product['image'],
            ]);
        }
    }
}
