<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use App\Enums\KeywordStatusEnum;

class ActiveKeywordScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->whereStatus(KeywordStatusEnum::ACTIVE->value);
    }
}
