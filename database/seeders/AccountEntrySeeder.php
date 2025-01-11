<?php

namespace Database\Seeders;

use App\Models\AccountEntry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountEntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AccountEntry::factory()->count(150)->create();
    }
}
