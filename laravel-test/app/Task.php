<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $fillable = [
        'subject',
        'description',
        'complete_date',
        'completed',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo('App\User');
    }
    
}
