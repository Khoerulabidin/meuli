<?php

namespace Database\Seeders;

use App\Models\CodeMstr;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CodeMstrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $educations = [
            [
                'code_mstr_fldname' => 'education',
                'code_mstr_value' => 'sd',
                'code_mstr_cmmt' => 'SD',
                'code_mstr_cb' => '1'
            ],
            [
                'code_mstr_fldname' => 'education',
                'code_mstr_value' => 'sltp',
                'code_mstr_cmmt' => 'SLTP',
                'code_mstr_cb' => '4'
            ],
            [
                'code_mstr_fldname' => 'education',
                'code_mstr_value' => 'slta',
                'code_mstr_cmmt' => 'SLTA',
                'code_mstr_cb' => '3'
            ],
            [
                'code_mstr_fldname' => 'education',
                'code_mstr_value' => 'diploma',
                'code_mstr_cmmt' => 'DIPLOMA',
                'code_mstr_cb' => '2'
            ],
            [
                'code_mstr_fldname' => 'education',
                'code_mstr_value' => 'sarjana',
                'code_mstr_cmmt' => 'SARJANA',
                'code_mstr_cb' => '1'
            ],
            [
                'code_mstr_fldname' => 'education',
                'code_mstr_value' => 'etc',
                'code_mstr_cmmt' => 'LAINNYA',
                'code_mstr_cb' => '4'
            ],
        ];

        foreach ($educations as $education) {
            CodeMstr::create($education);
        }
    }
}
