<?php

namespace App\Actions\Keyword;

use App\Models\Keyword;
use App\Models\KeywordTag;
use Illuminate\Support\Arr;

class StoreKeywordAction
{
    public function handle(array $data): Keyword
    {
        $keyword = Keyword::create(Arr::except($data, ['keywordTags']));

        foreach ($data['keywordTags'] as $tag) {
            KeywordTag::create([
                'keyword_id' => $keyword->id,
                'tag' => $tag->value
            ]);
        }
        return $keyword;
    }
}
