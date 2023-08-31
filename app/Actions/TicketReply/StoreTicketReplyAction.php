<?php

namespace App\Actions\TicketReply;

use App\Models\TicketReply;
use Illuminate\Support\Facades\Auth;

class StoreTicketReplyAction
{
    public function handle($data, $ticket)
    {
        $ticketreply = TicketReply::create([
            'ticket_id' => $ticket->id,
            'user_id' => Auth::user()->id == $ticket->user_id ? Auth::user()->id : null,
            'staff_id' => Auth::user()->id == $ticket->assignee ? Auth::user()->id : null,
            'description' => $data['description'],
        ]);

        if (array_key_exists('image', $data)) {
            $ticketreply->addMediaFromRequest('image')->toMediaCollection('ticketreply_image');
        }

        return $ticketreply;
    }
}
