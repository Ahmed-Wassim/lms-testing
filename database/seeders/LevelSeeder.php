<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('levels')->truncate();

        $levels = [
            [
                'name' => 'First Secondary',
                'description' => 'This is the first level of secondary education.',
            ],
            [
                'name' => 'Second Secondary',
                'description' => 'This is the second level of secondary education.',
            ],
            [
                'name' => 'Third Secondary',
                'description' => 'This is the third level of secondary education.',
            ],
            [
                'name' => 'First High School',
                'description' => 'This is the first level of high school education.',
            ],
            [
                'name' => 'Second High School',
                'description' => 'This is the second level of high school education.',
            ],
            [
                'name' => 'Third High School',
                'description' => 'This is the third level of high school education.',
            ],
        ];

        foreach ($levels as $level) {
            Level::create($level);
        }
    }
}
