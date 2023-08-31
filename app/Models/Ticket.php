<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['ticket_number','user_id', 'ticket_category_id', 'assignee', 'subject', 'description', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ticketCategory()
    {
        return $this->belongsTo(TicketCategory::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function ticketsReply()
    {
        return $this->hasMany(TicketReply::class);
    }

    public function assigneeUser()
    {
        return $this->belongsTo(User::class, 'assignee', 'id');
    }
}
