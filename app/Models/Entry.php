<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $fillable = [
        'title',
        'description',
        'amount',
        'entry_date',
        'entry_type_id',
    ];

    // public function getEntryDateAttribute($value)
    // {
    //     return date('d/m/Y', strtotime($value));
    // }

    public function getAmountAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }

    public function entryType()
    {
        return $this->belongsTo(EntryType::class);
    }
}
