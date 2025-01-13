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

    public function entryType()
    {
        return $this->belongsTo(EntryType::class);
    }
    
}
