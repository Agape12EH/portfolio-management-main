<?php

namespace App\Models;

use App\Enums\CustomerType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'doc_type',
        'dni',
        'email',
        'address',
        'phone',
        'customer_id',
    ];

    protected $casts = [
        'type' => CustomerType::class,
    ];

    public function codebtor(): BelongsTo {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function loans(): HasMany {
        return $this->hasMany(Loan::class);
    }
}
