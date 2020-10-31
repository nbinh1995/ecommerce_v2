<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model
{
    const PRIMARY_KEY_TABLE = 'id';

    use SoftDeletes;
    protected $table = 'attributes';
    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y',
        'updated_at' => 'datetime:d/m/Y',
        'deleted_at' => 'datetime:d/m/Y'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, CategoryAttr::class, CategoryAttr::FOREIGN_KEY_ATTRIBUTE, CategoryAttr::FOREIGN_KEY_CATEGORY);
    }

    public function attributeValues()
    {
        return $this->hasMany(AttributeValue::class, AttributeValue::FOREIGN_KEY_ATTRIBUTE, self::PRIMARY_KEY_TABLE);
    }

    public function getAttrValues()
    {
        return $this->load('attributeValues')->attributeValues;
    }

    public function toHtmlAttrValues()
    {
        $attrValues = $this->getAttrValues();
        $html = [];
        foreach ($attrValues as $attrValue) {
            $html[] = "<span class='btn btn-outline-primary btn-xs'>{$attrValue->attr_value}</span>";
        }
        return implode(" ", $html);
    }

    public function toStringAttrValues()
    {
        $attrValues = $this->getAttrValues();
        $string = [];
        foreach ($attrValues as $attrValue) {
            $string[] = $attrValue->attr_value;
        }
        return implode(",", $string);
    }

    public static function createAttribute(array $request): void
    {
        $attribute = self::create(['attr_name' => $request['attr_name']]);

        if (isset($request['attr_value'])) {
            $attr_values = explode(',', $request['attr_value']);
            AttributeValue::findOrCreateArrayAttrValue($attr_values, $attribute->id);
        }
    }

    public static function updateAttribute(array $request, Attribute $attribute)
    {
        $attribute->update(['attr_name' => $request['attr_name']]);
        $attr_values = explode(',', $attribute->toStringAttrValues());
        if (isset($request['attr_value'])) {
            $new_attr_values = explode(',', $request['attr_value']);

            if ($item = array_diff($attr_values, $new_attr_values)) {
                AttributeValue::deleteArrayAttrValue($item, $attribute->id);
            } else {
                AttributeValue::findOrCreateArrayAttrValue($new_attr_values, $attribute->id);
            }
        } else {
            AttributeValue::deleteArrayAttrValue($attr_values, $attribute->id);
        }
    }

    public static function deleteAttribute(Attribute $attribute)
    {
        AttributeValue::where('attribute_id', $attribute->id)->delete();
        $attribute->delete();
    }
}
