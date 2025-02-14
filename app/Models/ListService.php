<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListService extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'time_estimate',
        'price',
    ];

    // Relasi dengan model ServiceCategory
    public function category()
    {
        return $this->belongsTo(ServiceCategory::class);
    }
}
