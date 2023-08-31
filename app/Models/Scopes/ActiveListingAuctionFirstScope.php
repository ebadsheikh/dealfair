<?php

namespace App\Models\Scopes;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ActiveListingAuctionFirstScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->where(function ($query) {
            $query->whereNull('auction_end')
                ->orWhere('auction_end', '>', Carbon::now());
        })
            ->orderByRaw('CASE WHEN auction_end IS NULL THEN 1 ELSE 0 END')
            ->orderBy('auction_end', 'ASC');
    }
}
