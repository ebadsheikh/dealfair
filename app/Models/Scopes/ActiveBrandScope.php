<?php

namespace App\Models\Scopes;

use App\Enums\BrandStatusEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ActiveBrandScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->whereStatus(BrandStatusEnum::ACTIVE->value);
    }
}
