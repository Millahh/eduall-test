<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = fopen(database_path('seeders/dataset.csv'), 'r');
        fgetcsv($file);
        while (($data = fgetcsv($file, 1000, ',')) !== FALSE) {
            Product::create([
                'brand' => $data[0],
                'model' => $data[1],
                'screen_size' => $data[2],
                'color' => $data[3],
                'harddisk' => $data[4],
                'cpu' => $data[5],
                'ram' => $data[6],
                'OS' => $data[7],
                'special_features' => $data[8],
                'graphics' => $data[9],
                'graphics_coprocessor' => $data[10],
                'cpu_speed' => $data[11],
                'rating' => floatval($data[12]),
                'price' => floatval(str_replace(['$', ','], '', $data[13])), 
            ]);
        }
        fclose($file);
    }
}
