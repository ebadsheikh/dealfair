<?php

namespace App\Actions\Ticket;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class StoreTicketAction
{
    public function handle(array $data): Ticket
    {
        $user_id = Auth::id();
        $ticket = Ticket::create([
            'user_id' => $user_id,
            'ticket_number' => 'TCKT.'. random_int(1000, 9999),
            'ticket_category_id' => $data['ticket_category_id'],
            'subject' => $data['subject'],
            'description' => $data['description'],
        ]);

        return $ticket;
    }
}
