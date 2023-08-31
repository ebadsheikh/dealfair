<?php

namespace App\Actions\Keyword;

use App\Models\Keyword;
use App\Models\KeywordTag;
use Illuminate\Support\Arr;

class UpdateKeywordAction
{
    public function handle(Keyword $keyword, array $data): Keyword
    {
        $keyword->update(Arr::except($data, ['keywordTags']));

        $keyword->load('keywordTags');

        // Get the existing tag values for the keyword
        $existingTags = $keyword->keywordTags->pluck('tag')->all();

        $updatedTags = [];

        // Loop through the provided keywordTags
        foreach ($data['keywordTags'] as $tag) {
            $tagValue = $tag;
            $updatedTags[] = $tagValue;
            // If the tag does not exist, create a new KeywordTag
            if (!in_array($tagValue, $existingTags)) {
                KeywordTag::create([
                    'keyword_id' => $keyword->id,
                    'tag' => $tagValue['value']
                ]);
            }
        }

        // Delete tags that are not present in the input data
        KeywordTag::where('keyword_id', $keyword->id)
            ->whereNotIn('tag', $updatedTags)
            ->delete();

        return $keyword;
    }
}
