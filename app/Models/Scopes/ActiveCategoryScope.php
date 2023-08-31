<?php

namespace App\Models\Scopes;

use App\Enums\CategoryStatusEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ActiveCategoryScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->whereStatus(CategoryStatusEnum::ACTIVE->value);
    }
}
