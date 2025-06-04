<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CodeMstr; // Sesuaikan dengan namespace model CodeMstr Anda
use Carbon\Carbon; // Import Carbon untuk timestamp

class CodeMstrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $codeMasters = [
            // --- Kategori Produk (item_cat) ---
            [
                'code_mstr_fldname' => 'item_cat',
                'code_mstr_value'   => 'coffee_hot',
                'code_mstr_cmmt'    => 'Kopi Panas',
                'code_mstr_cb'      => 1,
            ],
            [
                'code_mstr_fldname' => 'item_cat',
                'code_mstr_value'   => 'coffee_iced',
                'code_mstr_cmmt'    => 'Kopi Dingin',
                'code_mstr_cb'      => 2,
            ],
            [
                'code_mstr_fldname' => 'item_cat',
                'code_mstr_value'   => 'non_coffee',
                'code_mstr_cmmt'    => 'Non-Kopi',
                'code_mstr_cb'      => 3,
            ],
            [
                'code_mstr_fldname' => 'item_cat',
                'code_mstr_value'   => 'food_main',
                'code_mstr_cmmt'    => 'Makanan Utama',
                'code_mstr_cb'      => 3,
            ],
            [
                'code_mstr_fldname' => 'item_cat',
                'code_mstr_value'   => 'food_snack',
                'code_mstr_cmmt'    => 'Cemilan',
                'code_mstr_cb'      => 2,
            ],
            [
                'code_mstr_fldname' => 'item_cat',
                'code_mstr_value'   => 'dessert',
                'code_mstr_cmmt'    => 'Dessert',
                'code_mstr_cb'      => 1,
            ],

            // --- Status Pesanan (order_status) ---
            [
                'code_mstr_fldname' => 'order_status',
                'code_mstr_value'   => 'pending',
                'code_mstr_cmmt'    => 'Menunggu Pembayaran',
                'code_mstr_cb'      => 1,
            ],
            [
                'code_mstr_fldname' => 'order_status',
                'code_mstr_value'   => 'paid',
                'code_mstr_cmmt'    => 'Sudah Dibayar',
                'code_mstr_cb'      => 2,
            ],
            [
                'code_mstr_fldname' => 'order_status',
                'code_mstr_value'   => 'processing',
                'code_mstr_cmmt'    => 'Sedang Diproses',
                'code_mstr_cb'      => 3,
            ],
            [
                'code_mstr_fldname' => 'order_status',
                'code_mstr_value'   => 'ready_for_pickup',
                'code_mstr_cmmt'    => 'Siap Diambil',
                'code_mstr_cb'      => 3,
            ],
            [
                'code_mstr_fldname' => 'order_status',
                'code_mstr_value'   => 'on_delivery',
                'code_mstr_cmmt'    => 'Dalam Pengiriman',
                'code_mstr_cb'      => 2,
            ],
            [
                'code_mstr_fldname' => 'order_status',
                'code_mstr_value'   => 'completed',
                'code_mstr_cmmt'    => 'Selesai',
                'code_mstr_cb'      => 1,
            ],
            [
                'code_mstr_fldname' => 'order_status',
                'code_mstr_value'   => 'cancelled',
                'code_mstr_cmmt'    => 'Dibatalkan',
                'code_mstr_cb'      => 1,
            ],

            // --- Tipe Pemesanan (order_type) ---
            [
                'code_mstr_fldname' => 'order_type',
                'code_mstr_value'   => 'pickup',
                'code_mstr_cmmt'    => 'Ambil Sendiri (Pick-up)',
                'code_mstr_cb'      => 2,
            ],
            [
                'code_mstr_fldname' => 'order_type',
                'code_mstr_value'   => 'delivery',
                'code_mstr_cmmt'    => 'Pesan Antar (Delivery)',
                'code_mstr_cb'      => 3,
            ],
            [
                'code_mstr_fldname' => 'order_type',
                'code_mstr_value'   => 'dine_in',
                'code_mstr_cmmt'    => 'Makan di Tempat (Dine-in)',
                'code_mstr_cb'      => 3,
            ],

            // --- Metode Pembayaran (payment_method) ---
            [
                'code_mstr_fldname' => 'payment_method',
                'code_mstr_value'   => 'cod',
                'code_mstr_cmmt'    => 'Bayar di Tempat (COD/Pick-up)',
                'code_mstr_cb'      => 2,
            ],
            [
                'code_mstr_fldname' => 'payment_method',
                'code_mstr_value'   => 'bank_transfer',
                'code_mstr_cmmt'    => 'Transfer Bank',
                'code_mstr_cb'      => 1,
            ],
            [
                'code_mstr_fldname' => 'payment_method',
                'code_mstr_value'   => 'e_wallet',
                'code_mstr_cmmt'    => 'E-Wallet',
                'code_mstr_cb'      => 1,
            ],

            // --- Status Ketersediaan Produk (product_status) ---
            [
                'code_mstr_fldname' => 'product_status',
                'code_mstr_value'   => 'active',
                'code_mstr_cmmt'    => 'Tersedia',
                'code_mstr_cb'      => 2,
            ],
            [
                'code_mstr_fldname' => 'product_status',
                'code_mstr_value'   => 'inactive',
                'code_mstr_cmmt'    => 'Tidak Tersedia',
                'code_mstr_cb'      => 3,
            ],
            [
                'code_mstr_fldname' => 'product_status',
                'code_mstr_value'   => 'sold_out',
                'code_mstr_cmmt'    => 'Stok Habis',
                'code_mstr_cb'      => 3,
            ],

        ];

        foreach ($codeMasters as $codeMaster) {
            CodeMstr::firstOrCreate(
                [
                    'code_mstr_fldname' => $codeMaster['code_mstr_fldname'],
                    'code_mstr_value'   => $codeMaster['code_mstr_value'],
                ],
                $codeMaster
            );
        }
    }
}
