<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class TicketReply extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['ticket_id','user_id', 'staff_id', 'description'];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function staff()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Function to save to media to collection
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('ticket_reply_image')
            ->useDisk('s3');
    }
}
