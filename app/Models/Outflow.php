<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Outflow extends Model
{
    protected $fillable = [
        'title',
        'description',
        'amount',
        'date',
    ];

    public function getAmountAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }

    public function entryType()
    {
        return $this->belongsTo(EntryType::class);
    }
}
