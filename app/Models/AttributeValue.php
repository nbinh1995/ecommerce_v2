<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttributeValue extends Model
{
    const PRIMARY_KEY_TABLE = 'id';
    const FOREIGN_KEY_ATTRIBUTE = 'attribute_id';

    use SoftDeletes;
    protected $table = 'attribute_values';
    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y',
        'updated_at' => 'datetime:d/m/Y',
        'deleted_at' => 'datetime:d/m/Y'
    ];

    public function attr()
    {
        return $this->belongsTo(Attribute::class, self::FOREIGN_KEY_ATTRIBUTE, Attribute::PRIMARY_KEY_TABLE);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, ProductAttr::class, ProductAttr::FOREIGN_KEY_ATTR_VALUE, ProductAttr::FOREIGN_KEY_PRODUCT);
    }

    public static function findOrCreateArrayAttrValue(array $attr_values, int $attribute_id): void
    {
        foreach ($attr_values as $attr_value) {
            self::firstOrCreate([
                'attribute_id' => $attribute_id,
                'attr_value' => $attr_value
            ]);
        }
    }

    public static function deleteArrayAttrValue(array $attr_values, int $attribute_id): void
    {
        foreach ($attr_values as $attr_value) {
            self::where('attribute_id', $attribute_id)->where('attr_value', $attr_value)->delete();
        }
    }
}
