<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $table = 'categories';
    protected $guarded = [];

    public function billDetails()
    {
        return $this->hasMany(Product::class, 'category_id', 'id')->orderBy('id', 'DESC');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
