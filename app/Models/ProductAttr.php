<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductAttr extends Model
{
    const FOREIGN_KEY_PRODUCT = 'product_id';
    const FOREIGN_KEY_ATTR_VALUE = 'attribute_value_id';

    use SoftDeletes;
    protected $table = 'attribute_value_product';
    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y',
        'updated_at' => 'datetime:d/m/Y',
        'deleted_at' => 'datetime:d/m/Y'
    ];
}
