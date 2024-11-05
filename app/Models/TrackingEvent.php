<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackingEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'tracker_id',
        'tracking_number',
        'status',
        'remarks',
        'date_updated',
        'senders_name',
        'receivers_name',
    ];

    public function tracker()
    {
        return $this->belongsTo(Tracker::class);
    }
}
