<?php

namespace App\Events;

use App\Models\Listing;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ListingViewEvent
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public Listing $listing;

    public string $requestFrom;

    /**
     * Create a new event instance.
     */
    public function __construct(Listing $listing, string $requestFrom)
    {
        $this->listing = $listing;
        $this->requestFrom = $requestFrom;
    }
}
