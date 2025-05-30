<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TableMstr;
use Illuminate\Support\Str;

class TableMstrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tables = [
            [
                'table_mstr_uuid'    => Str::uuid(),
                'table_mstr_name'    => 'Meja 01',
                'table_mstr_desc'    => 'Meja untuk 2 orang, dekat jendela',
                'table_mstr_barcode' => 'TBL001',
                'table_mstr_status'  => 'available',
                'table_mstr_branch'  => 1,
                'table_mstr_cb'      => 3,
            ],
            [
                'table_mstr_uuid'    => Str::uuid(),
                'table_mstr_name'    => 'Meja 02',
                'table_mstr_desc'    => 'Meja besar untuk 4 orang',
                'table_mstr_barcode' => 'TBL002',
                'table_mstr_status'  => 'available',
                'table_mstr_branch'  => 1,
                'table_mstr_cb'      => 2,
            ],
            [
                'table_mstr_uuid'    => Str::uuid(),
                'table_mstr_name'    => 'Meja VIP',
                'table_mstr_desc'    => 'Meja khusus dengan sofa',
                'table_mstr_barcode' => 'TBL003',
                'table_mstr_status'  => 'reserved',
                'table_mstr_branch'  => 2,
                'table_mstr_cb'      => 1,
            ],
            [
                'table_mstr_uuid'    => Str::uuid(),
                'table_mstr_name'    => 'Meja 03',
                'table_mstr_desc'    => 'Meja untuk 2 orang, dekat pintu masuk',
                'table_mstr_barcode' => 'TBL004',
                'table_mstr_status'  => 'available',
                'table_mstr_branch'  => 3,
                'table_mstr_cb'      => 3,
            ],
        ];

        foreach ($tables as $table) {
            TableMstr::create($table);
        }
    }
}
