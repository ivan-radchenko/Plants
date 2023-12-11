<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Plants extends Model
{
    use HasFactory;

    protected $table = 'plants';

    protected $fillable = [
        'userID',
        'name',
        'image',
        'waterSummer',
        'waterWinter',
        'lightSummer',
        'lightWinter',
        'light',
        'wet',
        'last-watering'
    ];

    public function user(): BelongsTo
    {
        return $this->BelongsTO(User::class, 'userID');
    }
}
