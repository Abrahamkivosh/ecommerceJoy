<?php

namespace App\Models;

use App\Models\Image;
use App\Models\OrderDetail;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id');
    }
    /**
     * Get all of the reviews for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, 'product_id', 'id');
    }
    /**
     * Get all of the comments for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany(Image::class, 'product_id', 'id');
    }
     /**
     * Get all of the order_details for the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // public function order_details(): HasMany
    // {
    //     return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    // }
}
