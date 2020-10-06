<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    const PRODUCT_PER_PAGE = 9;
    const IS_NEW = 1;
    const FOREIGN_KEY_CATEGORY = 'category_id';
    const PRIMARY_KEY_TABLE = 'id';

    use SoftDeletes;
    protected $table = 'products';
    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y',
        'updated_at' => 'datetime:d/m/Y',
        'deleted_at' => 'datetime:d/m/Y'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class, self::FOREIGN_KEY_CATEGORY, Category::PRIMARY_KEY_TABLE);
    }

    public function billDetails()
    {
        return $this->hasMany(BillDetail::class, 'product_id', self::PRIMARY_KEY_TABLE);
    }

    public static function getProductsWithCategoryByID(int $category_id)
    {
        return self::with('category:id,name,slug')->where('category_id', $category_id)->paginate(self::PRODUCT_PER_PAGE);
    }

    public static function getProductsAllOrderByDESC()
    {
        return self::with('category:id,name,slug')->orderBy('created_at', 'DESC')->paginate(self::PRODUCT_PER_PAGE);
    }

    public static function getProductsNewArrivals()
    {
        return self::with('category:id,name,slug')->where('is_new', self::IS_NEW)->paginate(self::PRODUCT_PER_PAGE);
    }
}
