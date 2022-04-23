<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    /**
     * Get the sub_category that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sub_category(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sub_category_id', 'id');
    }
}
