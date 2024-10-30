<?php

namespace App\Models;

use Dotenv\Parser\Entry;
use Illuminate\Database\Eloquent\Model;

class EntryType extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function entries()
    {
        return $this->hasMany(Entry::class);
    }
}
