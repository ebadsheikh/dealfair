<?php

namespace App\Actions\Topics;

class UpdateTopicAction
{
    public function handle($data, $topic)
    {
        $topic = $topic->update($data);

        return $topic;
    }
}
