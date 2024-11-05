<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TrackingEvent;

class Tracker extends Model
{
    use HasFactory;
    // Specify the fields that can be mass assigned
    protected $fillable = [
        'sent_date',
        'arrival_date',
        'senders_name',
        'senders_email',
        'senders_phone',
        'senders_address',
        'senders_country',
        'receivers_name',
        'receivers_email',
        'receivers_phone',
        'receivers_address',
        'receivers_country',
        'status',
        'tracking_number',
        'items',
        'weight',
        'shipping_method',
        'tax',
    ];



    // Optionally, you can define date casts for date fields
    protected $casts = [
        'sent_date' => 'date',
        'arrival_date' => 'date',
        'tax' => 'decimal:2',
    ];

     // Generate tracking number before saving
     protected static function boot()
     {
         parent::boot();

         static::creating(function ($courier) {
             if (empty($courier->tracking_number)) {
                 $courier->tracking_number = strtoupper(uniqid('TRK-'));
             }
         });
     }

     public function trackingEvents()
    {
        return $this->hasMany(TrackingEvent::class);
    }

    public function updateStatus($status)
    {
        $this->status = $status; // Assuming there is a 'status' column
        $this->save();
    }
}
