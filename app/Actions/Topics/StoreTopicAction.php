<?php

namespace App\Actions\Topics;

use App\Models\Topic;

class StoreTopicAction
{
    public function handle($data)
    {
        $user = Topic::create($data);

        return $user;
    }
}
