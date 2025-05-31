<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ItemMstr;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserMstrSeeder::class);
        $this->call(BranchMstrSeeder::class);
        $this->call(CodeMstrSeeder::class);
        $this->call(ItemMstrSeeder::class);
        $this->call(TableMstrSeeder::class);
    }
}
