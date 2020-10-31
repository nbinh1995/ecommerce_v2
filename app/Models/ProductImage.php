<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    const FOREIGN_KEY_PRODUCT = 'product_id';

    protected $table = 'product_images';
    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y',
        'updated_at' => 'datetime:d/m/Y',
        'deleted_at' => 'datetime:d/m/Y'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, self::FOREIGN_KEY_PRODUCT, Product::PRIMARY_KEY_TABLE);
    }

    public static function getImagesByProductId($product_id)
    {
        return self::select('path')->where('product_id', $product_id)->get();
    }
}
