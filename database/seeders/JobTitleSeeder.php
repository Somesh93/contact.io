<?php

namespace Database\Seeders;

use App\Models\JobTitle;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class JobTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $insertArr = [
            ['title' => 'CEO', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['title' => 'CTO', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['title' => 'CIO', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['title' => 'DEV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['title' => 'MNG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        JobTitle::insert($insertArr);
    }
}
