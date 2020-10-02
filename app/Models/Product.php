<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $table = 'products';
    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y',
        'updated_at' => 'datetime:d/m/Y',
        'deleted_at' => 'datetime:d/m/Y'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function billDetails()
    {
        return $this->hasMany(BillDetail::class, 'product_id', 'id');
    }

    public function showPrice(string $currency, bool $left_right)
    {
        return $left_right ? $currency . ' ' . number_format($this->price, 0, ',', ',')  : number_format($this->price, 0, ',', ',') . ' ' . $currency;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
