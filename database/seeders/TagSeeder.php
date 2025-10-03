<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Tags\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tags')->delete();

        $subjects = [
            'English',
            'Arabic',
            'French',
            'Science',
            'Physics',
            'Chemistry',
            'Math',
            'Biology',
            // you can add more subject names here
        ];

        foreach ($subjects as $subject) {
            // find or create ensures duplicates are avoided
            Tag::findOrCreate($subject);
        }
    }
}
