<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MonnifyAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank',
        'account_name',
        'account_number',
        'account_reference',
        'bank_code',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
