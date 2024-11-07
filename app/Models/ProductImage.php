<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'image_data',
        'is_primary',
    ];

    protected $casts = [
        'is_primary' => 'boolean',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($image) {
            if ($image->is_primary) {
                $image->product->images()->update(['is_primary' => false]);
            }
        });

        static::updating(function ($image) {
            if ($image->is_primary) {
                $image->product->images()->where('id', '!=', $image->id)->update(['is_primary' => false]);
            }
        });
    }
}
