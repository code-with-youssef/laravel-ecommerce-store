<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            1 => 'Camera',
            2 => 'Food',
            3 => 'Electronics',
            4 => 'Watch',
            5 => 'Bag',
            6 => 'Makeup',
        ];

        foreach ($categories as $id => $label) {
            // شوف كام منتج موجود بالفعل للكategor دي
            $existingCount = Product::where('category_id', $id)->count();

            // لو أقل من 30، كمل الباقي
            $toCreate = 30 - $existingCount;

            if ($toCreate > 0) {
                for ($i = 1; $i <= $toCreate; $i++) {
                    Product::create([
                        'name' => $label . ' Product ' . $i,
                        'description' => 'This is a description for ' . strtolower($label) . ' product ' . $i,
                        'price' => rand(50, 5000),
                        'category_id' => $id,
                        'imagepath' => 'https://picsum.photos/seed/' . uniqid() . '/400/300',
                        'quantity' => rand(1, 100),
                    ]);
                }
            }
        }
    }
}
