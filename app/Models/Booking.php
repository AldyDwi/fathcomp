<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'booking_number',
        'customer_id',
        'category_id',
        'laptop_brand',
        'laptop_type',
        'problem_description',
        'status',
        'booking_date',
        'notes',
    ];

    protected $attributes = [
        'notes' => '-', 
    ];

    protected $casts = [
        'booking_date' => 'date',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($booking) {
            $booking->booking_number = 'BK' . date('Ymd') . str_pad(static::whereDate('created_at', today())->count() + 1, 4, '0', STR_PAD_LEFT);
        });
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function technician()
    {
        return $this->belongsTo(User::class, 'technician_id');
    }

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'category_id');
    }

    public function images()
    {
        return $this->hasMany(BookingImage::class);
    }

    public function serviceReport()
    {
        return $this->hasOne(ServiceReport::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function testimonial()
    {
        return $this->hasOne(Testimonial::class);
    }
}
