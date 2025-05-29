<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BranchMstr;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BranchMstrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $branches = [
            [
                'branch_mstr_uuid'      => Str::uuid(),
                'branch_mstr_name'      => 'Kopi Senja Cabang Pusat',
                'branch_mstr_joined'    => Carbon::parse('2022-01-15')->format('Y-m-d'),
                'branch_mstr_addr1'     => 'Jl. Merdeka No. 10',
                'branch_mstr_addr2'     => 'Jakarta Pusat',
                'branch_mstr_telp'      => '021-1234567',
                'branch_mstr_fax'       => null,
                'branch_mstr_email'     => 'pusat@kopisenja.com',
                'branch_mstr_pic'       => 'Budi Santoso',
                'branch_mstr_sosmed1'   => 'https://instagram.com/kopisenja_pusat',
                'branch_mstr_sosmed2'   => null,
                'branch_mstr_sosmed3'   => null,
                'branch_mstr_sosmed4'   => null,
                'branch_mstr_img'       => 'branch_pusat.jpg',
                'branch_mstr_profile'   => json_encode(['description' => 'Cabang utama Kopi Senja.']),
                'branch_mstr_cb'        => 1,
            ],
            [
                'branch_mstr_uuid'      => Str::uuid(),
                'branch_mstr_name'      => 'Kopi Senja Cabang Selatan',
                'branch_mstr_joined'    => Carbon::parse('2023-03-20')->format('Y-m-d'),
                'branch_mstr_addr1'     => 'Jl. Pahlawan No. 25',
                'branch_mstr_addr2'     => 'Jakarta Selatan',
                'branch_mstr_telp'      => '021-9876543',
                'branch_mstr_fax'       => null,
                'branch_mstr_email'     => 'selatan@kopisenja.com',
                'branch_mstr_pic'       => 'Siti Aminah',
                'branch_mstr_sosmed1'   => 'https://instagram.com/kopisenja_selatan',
                'branch_mstr_sosmed2'   => null,
                'branch_mstr_sosmed3'   => null,
                'branch_mstr_sosmed4'   => null,
                'branch_mstr_img'       => 'branch_selatan.jpg',
                'branch_mstr_profile'   => json_encode(['description' => 'Nikmati kopi terbaik di Jakarta Selatan.']),
                'branch_mstr_cb'        => 1,
            ],

            [
                'branch_mstr_uuid'      => Str::uuid(),
                'branch_mstr_name'      => 'Kopi Senja Cabang Utara',
                'branch_mstr_joined'    => Carbon::parse('2023-05-10')->format('Y-m-d'),
                'branch_mstr_addr1'     => 'Jl. Kebon Jeruk No. 30',
                'branch_mstr_addr2'     => 'Jakarta Utara',
                'branch_mstr_telp'      => '021-1122334',
                'branch_mstr_fax'       => null,
                'branch_mstr_email'     => 'utara@kopiklotok.com',
                'branch_mstr_pic'       => 'Andi Wijaya',
                'branch_mstr_sosmed1'   => 'https://instagram.com/kopisenja_utara',
                'branch_mstr_sosmed2'   => null,
                'branch_mstr_sosmed3'   => null,
                'branch_mstr_sosmed4'   => null,
                'branch_mstr_img'       => 'branch_utara.jpg',
                'branch_mstr_profile'   => json_encode(['description' => 'Kedai kopi dengan suasana nyaman di Jakarta Utara.']),
                'branch_mstr_cb'        => 1,
            ]
        ];

        foreach ($branches as $branch) {
            BranchMstr::create($branch);
        }
    }
}
