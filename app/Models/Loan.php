<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Loan extends Model {
    use HasFactory;

    protected $fillable = [
        'amount',
        'fees',
        'taxes',
        'state',
        'customer_id',
    ];

    public function customer(): BelongsTo {
        return $this->belongsTo(Customer::class);
    }

    public function items(): hasMany {
        return $this->hasMany(LoanItem::class);
    }
}
