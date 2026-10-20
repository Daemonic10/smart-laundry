<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Transaction extends Model
{
    protected $fillable = [
        'invoice_code',
        'customer_name',
        'phone',
        'service_id',
        'weight',
        'total_price',
        'status',
    ];

    public function service(): BelongsTo
    {
        return $this->BelongsTo(Service::class, 'service_id');
    }
};
