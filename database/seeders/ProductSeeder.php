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
        $procuts=[
            [
                'name' =>'Macbook Pro',
                'details' =>'M1 pro 16 gb',
                'descreption' =>'This is the descreption of the product',
                'brand' =>'Apple',
                'price' =>2499,
                'shipping_cose' =>25,
                'image_path' =>'storage/product.png',
            ],
            [
                'name' =>'Galaxy book pro',
                'details' =>'13 inch 8gb ram ',
                'descreption' =>'This is the descreption of the product',
                'brand' =>'Samsung',
                'price' =>4000,
                'shipping_cose' =>25,
                'image_path' =>'storage/product2.png',
            ],
            
            ];

            foreach($procuts as $key => $value){
                Product::create($value);

            }
    }
}
