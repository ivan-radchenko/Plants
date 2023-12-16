<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Plants extends Model
{
    use HasFactory;

    protected $table = 'plants';
    protected array $dates = ['created_at', 'updated_at', 'lastWatering'];
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
        'notes',
        'status',
        'lastWatering'
    ];

    public function user(): BelongsTo
    {
        return $this->BelongsTO(User::class, 'userID');
    }
}
