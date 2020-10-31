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

    public function productImages()
    {
        return $this->hasMany(ProductImage::class, ProductImage::FOREIGN_KEY_PRODUCT, self::PRIMARY_KEY_TABLE);
    }

    public function attributeValues()
    {
        return $this->belongsToMany(AttributeValue::class, ProductAttr::class, ProductAttr::FOREIGN_KEY_PRODUCT, ProductAttr::FOREIGN_KEY_ATTR_VALUE);
    }

    public function toHtmlNew(): string
    {
        return $this->is_new == 0 ? "<span class='btn btn-outline-danger btn-xs'>Not New</span>" : "<span class='btn btn-outline-primary btn-xs'>New</span>";
    }

    public static function getProductsWithCategoryByID(int $category_id)
    {
        return self::where('category_id', $category_id)->paginate(self::PRODUCT_PER_PAGE);
    }

    public static function getProductsAllOrderByDESC()
    {
        return self::orderBy('created_at', 'DESC')->paginate(self::PRODUCT_PER_PAGE);
    }

    public static function getProductsNewArrivals()
    {
        return self::where('is_new', self::IS_NEW)->paginate(self::PRODUCT_PER_PAGE);
    }

    public function getProductCategory()
    {
        return $this->load('category')->category;
    }

    public function getProductFirstImage()
    {
        return $this->load('productImages')->productImages[0];
    }

    public function getProductAllImages()
    {
        return $this->load('productImages')->productImages;
    }

    public function getAttributeValueByAttrID($attr_id)
    {
        return $this->load(['attributeValues' => function ($query) use ($attr_id) {
            $query->where('attribute_id', $attr_id);
        }])->attributeValues;
    }

    public function getProductAttributes()
    {
        return $this->load('category.attrs')->category->attrs;
    }

    public function getFullAttrNameValue(): array
    {
        $attrs = $this->getProductAttributes();
        foreach ($attrs as $attr) {
            $attrs_values["$attr->attr_name"] = $this->getAttributeValueByAttrID($attr->id);
        }

        return $attrs_values;
    }

    public function toHtmlFullNameProduct($attr_values, $attrs)
    {
        $result = "$this->name <br>";
        foreach ($attr_values as $attr_value) {
            $attr = $attrs->firstWhere('id', $attr_value->attribute_value_id);
            $result .= "<span class='btn btn-xs btn-outline-primary'><b>{$attr->attr_name}:</b> $attr->attr_value</span> ";
        }
        return $result;
    }
}
