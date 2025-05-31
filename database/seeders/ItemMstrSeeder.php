<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ItemMstrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productCategories = [
            'coffee_hot',
            'coffee_iced',
            'non_coffee',
            'food_main',
            'food_snack',
            'dessert',
        ];

        $items = [];
        // Base URL untuk gambar placeholder statis
        // picsum.photos memberikan gambar acak tapi dengan ID yang bisa diulang
        $baseImagePicsum = 'https://picsum.photos/seed/'; // Gunakan seed untuk gambar yang konsisten
        $imageSize = '400/300'; // Ukuran gambar: lebar/tinggi


        // --- Coffee Hot ---
        $items[] = [
            'item_mstr_uuid' => Str::uuid(),
            'item_mstr_code' => 'KPH-001',
            'item_mstr_desc' => 'Espresso',
            'item_mstr_spec' => json_encode([
                'size' => 'Single Shot',
                'beans' => 'Arabica',
                'origin' => 'Local Blend'
            ]),
            'item_mstr_cat' => 'coffee_hot',
            'item_mstr_um' => 'CUP',
            'item_mstr_status' => true,
            'item_mstr_img' => $baseImagePicsum . 'espresso/' . $imageSize, // Gambar statis untuk espresso
            'item_mstr_cb' => 1,
        ];
        $items[] = [
            'item_mstr_uuid' => Str::uuid(),
            'item_mstr_code' => 'KPH-002',
            'item_mstr_desc' => 'Latte',
            'item_mstr_spec' => json_encode([
                'size' => 'Regular',
                'milk_type' => 'Full Cream',
                'temperature' => 'Hot',
                'add_ons' => ['Extra Shot', 'Vanilla Syrup']
            ]),
            'item_mstr_cat' => 'coffee_hot',
            'item_mstr_um' => 'CUP',
            'item_mstr_status' => true,
            'item_mstr_img' => $baseImagePicsum . 'latte/' . $imageSize, // Gambar statis untuk latte
            'item_mstr_cb' => 1,
        ];
        $items[] = [
            'item_mstr_uuid' => Str::uuid(),
            'item_mstr_code' => 'KPH-003',
            'item_mstr_desc' => 'Cappuccino',
            'item_mstr_spec' => json_encode([
                'size' => 'Large',
                'milk_foam' => 'Thick',
                'sweetener' => 'Optional'
            ]),
            'item_mstr_cat' => 'coffee_hot',
            'item_mstr_um' => 'CUP',
            'item_mstr_status' => true,
            'item_mstr_img' => $baseImagePicsum . 'cappuccino/' . $imageSize, // Gambar statis untuk cappuccino
            'item_mstr_cb' => 1,
        ];

        // --- Coffee Iced ---
        $items[] = [
            'item_mstr_uuid' => Str::uuid(),
            'item_mstr_code' => 'KPD-001',
            'item_mstr_desc' => 'Es Kopi Susu',
            'item_mstr_spec' => json_encode([
                'ice_level' => 'Normal',
                'sugar_level' => 'Normal',
                'variant' => 'Gula Aren'
            ]),
            'item_mstr_cat' => 'coffee_iced',
            'item_mstr_um' => 'CUP',
            'item_mstr_status' => true,
            'item_mstr_img' => $baseImagePicsum . 'icedcoffee/' . $imageSize,
            'item_mstr_cb' => 1,
        ];
        $items[] = [
            'item_mstr_uuid' => Str::uuid(),
            'item_mstr_code' => 'KPD-002',
            'item_mstr_desc' => 'Iced Americano',
            'item_mstr_spec' => json_encode([
                'ice_level' => 'Extra Ice',
                'water_type' => 'Mineral Water'
            ]),
            'item_mstr_cat' => 'coffee_iced',
            'item_mstr_um' => 'CUP',
            'item_mstr_status' => true,
            'item_mstr_img' => $baseImagePicsum . 'icedamericano/' . $imageSize,
            'item_mstr_cb' => 1,
        ];

        // --- Non-Coffee ---
        $items[] = [
            'item_mstr_uuid' => Str::uuid(),
            'item_mstr_code' => 'NC-001',
            'item_mstr_desc' => 'Matcha Latte',
            'item_mstr_spec' => json_encode([
                'size' => 'Large',
                'sweetness' => 'Less Sugar',
                'topping' => 'Whipped Cream'
            ]),
            'item_mstr_cat' => 'non_coffee',
            'item_mstr_um' => 'CUP',
            'item_mstr_status' => true,
            'item_mstr_img' => $baseImagePicsum . 'matchalatte/' . $imageSize,
            'item_mstr_cb' => 2,
        ];
        $items[] = [
            'item_mstr_uuid' => Str::uuid(),
            'item_mstr_code' => 'NC-002',
            'item_mstr_desc' => 'Chocolate',
            'item_mstr_spec' => json_encode([
                'size' => 'Regular',
                'hot_cold' => 'Hot',
                'chocolate_type' => 'Dark Chocolate'
            ]),
            'item_mstr_cat' => 'non_coffee',
            'item_mstr_um' => 'CUP',
            'item_mstr_status' => true,
            'item_mstr_img' => $baseImagePicsum . 'hotchocolate/' . $imageSize,
            'item_mstr_cb' => 2,
        ];

        // --- Food Main ---
        $items[] = [
            'item_mstr_uuid' => Str::uuid(),
            'item_mstr_code' => 'FM-001',
            'item_mstr_desc' => 'Nasi Goreng',
            'item_mstr_spec' => json_encode([
                'level_pedas' => 'Sedang',
                'extra_ingredients' => ['Sosis', 'Telur Ceplok'],
                'serving_size' => 'Normal'
            ]),
            'item_mstr_cat' => 'food_main',
            'item_mstr_um' => 'PORTION',
            'item_mstr_status' => true,
            'item_mstr_img' => $baseImagePicsum . 'nasigoreng/' . $imageSize,
            'item_mstr_cb' => 3,
        ];
        $items[] = [
            'item_mstr_uuid' => Str::uuid(),
            'item_mstr_code' => 'FM-002',
            'item_mstr_desc' => 'Spaghetti Carbonara',
            'item_mstr_spec' => json_encode([
                'pasta_type' => 'Spaghetti',
                'sauce_base' => 'Creamy',
                'add_ons' => ['Keju Parmesan', 'Jamur']
            ]),
            'item_mstr_cat' => 'food_main',
            'item_mstr_um' => 'PORTION',
            'item_mstr_status' => true,
            'item_mstr_img' => $baseImagePicsum . 'spaghetticarbonara/' . $imageSize,
            'item_mstr_cb' => 3,
        ];

        // --- Food Snack ---
        $items[] = [
            'item_mstr_uuid' => Str::uuid(),
            'item_mstr_code' => 'FS-001',
            'item_mstr_desc' => 'French Fries',
            'item_mstr_spec' => json_encode([
                'size' => 'Medium',
                'sauce' => ['Tomato', 'Chili'],
                'crispiness' => 'Extra Crispy'
            ]),
            'item_mstr_cat' => 'food_snack',
            'item_mstr_um' => 'PORTION',
            'item_mstr_status' => true,
            'item_mstr_img' => $baseImagePicsum . 'frenchfries/' . $imageSize,
            'item_mstr_cb' => 2,
        ];
        $items[] = [
            'item_mstr_uuid' => Str::uuid(),
            'item_mstr_code' => 'FS-002',
            'item_mstr_desc' => 'Onion Rings',
            'item_mstr_spec' => json_encode([
                'serving_size' => 'Small',
                'dip' => 'Garlic Mayo'
            ]),
            'item_mstr_cat' => 'food_snack',
            'item_mstr_um' => 'PORTION',
            'item_mstr_status' => true,
            'item_mstr_img' => $baseImagePicsum . 'onionrings/' . $imageSize,
            'item_mstr_cb' => 2,
        ];

        // --- Dessert ---
        $items[] = [
            'item_mstr_uuid' => Str::uuid(),
            'item_mstr_code' => 'DSRT-001',
            'item_mstr_desc' => 'Brownies',
            'item_mstr_spec' => json_encode([
                'topping' => 'Kacang Almond',
                'serving_suggestion' => 'Warm',
                'contains_nuts' => true
            ]),
            'item_mstr_cat' => 'dessert',
            'item_mstr_um' => 'PC',
            'item_mstr_status' => true,
            'item_mstr_img' => $baseImagePicsum . 'brownies/' . $imageSize,
            'item_mstr_cb' => 1,
        ];
        $items[] = [
            'item_mstr_uuid' => Str::uuid(),
            'item_mstr_code' => 'DSRT-002',
            'item_mstr_desc' => 'Croissant',
            'item_mstr_spec' => json_encode([
                'variant' => 'Original',
                'crispiness' => 'High',
                'serving_temp' => 'Room Temperature'
            ]),
            'item_mstr_cat' => 'dessert',
            'item_mstr_um' => 'PC',
            'item_mstr_status' => true,
            'item_mstr_img' => $baseImagePicsum . 'croissant/' . $imageSize,
            'item_mstr_cb' => 1,
        ];

        // Insert data into the 'item_mstr' table
        DB::table('item_mstr')->insert($items);
    }
}
