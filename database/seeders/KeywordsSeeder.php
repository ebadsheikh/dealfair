<?php

namespace Database\Seeders;

use App\Models\Keyword;
use App\Models\KeywordTag;
use Illuminate\Database\Seeder;

class KeywordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Keyword::factory()->times(10)->create()->each(function ($keyword) {
            $keyword->keywordTags()->saveMany(KeywordTag::factory()->times(3)->make());
        });
    }
}
