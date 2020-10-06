<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    const PRIMARY_KEY_TABLE = 'id';

    use SoftDeletes;
    protected $table = 'categories';
    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class, Product::FOREIGN_KEY_CATEGORY, self::PRIMARY_KEY_TABLE)->orderBy('id', 'DESC');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
