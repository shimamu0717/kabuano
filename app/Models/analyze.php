<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\User;

class analyze extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'company',
        'start_date',
        'end_date',
        'start_price',
        'start_open_or_close',
        'end_price',
        'end_open_or_close',
        'high',
        'low',
        'yield',
        'yield_ratio',
        'comment',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }

    public function favorites(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\User', 'favorites')->withTimestamps();
    }

    public function isFavoriteBy(?User $user): bool
    {
        return $user
            ? (bool)$this->favorites->where('id', $user->id)->count()
            : false;
    }

}
