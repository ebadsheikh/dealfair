<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReportedUser extends Model
{
    use HasFactory;

    /**
     * Define the relationship with the reportedTo user.
     *
     * @return BelongsTo
     */
    public function reportedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reported_to');
    }


    /**
     * Define the relationship with the reportedBy user.
     *
     * @return BelongsTo
     */
    public function reportedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reported_by');
    }

    /**
     * Define the relationship with the reason.
     *
     * @return BelongsTo
     */
    public function reason()
    {
        return $this->belongsTo(ReportedUserReason::class, 'reason_id');
    }
}
