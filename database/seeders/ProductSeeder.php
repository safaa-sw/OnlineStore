<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'title' => 'Laptop HP',
                'price' => 100,
                'image' => 'productImages/1625383987laptop1.png',
            ],
            [
                'title' => 'Laptop Dell',
                'price' => 200,
                'image' => 'productImages/1625384010laptop2.jpg',
            ],
            [
                'title' => 'Laptop Lenovo',
                'price' => 150,
                'image' => 'productImages/1625384033laptop3.jpg',
            ],
            [
                'title' => 'Desktop PC HP',
                'price' => 250,
                'image' => 'productImages/1625384078desktop_pc1.jpg',
            ],
            [
                'title' => 'DeskTop PC Dell',
                'price' => 300,
                'image' => 'productImages/1625384095desktop_pc2.jpg',
            ],
            [
                'title' => 'Desktop Lenovo',
                'price' => 250,
                'image' => 'productImages/16255087851625384119desktop_pc3.jpg',
            ],
            [
                'title' => 'Fax Machine',
                'price' => 50,
                'image' => 'productImages/1625384150fax-machine1.jpg',
            ],
            [
                'title' => 'Printer Canon',
                'price' => 125,
                'image' => 'productImages/1625384218printer1.jpg',
            ],
            [
                'title' => 'Printer Epson',
                'price' => 175,
                'image' => 'productImages/162550718416255070151625384260printer3.jpg',
            ],
        ]);
    }
}
