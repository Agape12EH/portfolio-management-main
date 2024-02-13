<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LoanItem extends Model {
    use HasFactory;

    protected $fillable = [
        'payload',
        'version',
        'loan_id',
    ];

    public function loan(): BelongsTo {
        return $this->belongsTo(Loan::class);
    }

    protected $casts = [
        'payload' => 'json',
    ];
}
