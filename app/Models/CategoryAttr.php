<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryAttr extends Model
{
    const FOREIGN_KEY_CATEGORY = 'category_id';
    const FOREIGN_KEY_ATTRIBUTE = 'attribute_id';

    use SoftDeletes;
    protected $table = 'attribute_category';
    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y',
        'updated_at' => 'datetime:d/m/Y',
        'deleted_at' => 'datetime:d/m/Y'
    ];
}
