<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $attrs_values = [];
        foreach ($attrs as $attr) {
            $attrs_values["$attr->attr_name"] = $this->getAttributeValueByAttrID($attr->id);
        }

        return $attrs_values;
    }

    public function toHtmlFullAttrNameValue()
    {
        $product_attrs = $this->getFullAttrNameValue();
        $html = '';
        foreach ($product_attrs as $attr_name => $attr_values) {
            $html .= "<span class='btn btn-xs btn-outline-secondary text-left mb-1'><b>{$attr_name}:</b><br>";
            $arrayValue = [];
            foreach ($attr_values as $attr_value) {
                $arrayValue[] = $attr_value->attr_value;
            }
            $html .= implode(',', $arrayValue);
            $html .= '</span><br>';
        }

        return $html;
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
    protected static function dataRequest(Request $request): array
    {
        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'category_id' => $request->category_id,
            'meta_title' => $request->meta_title,
            'is_new' => 0
        ];

        if ($request->slug) {
            $data['slug'] = $request->slug;
        }
        if ($request->is_new) {
            $data['is_new'] = 1;
        }

        if ($request->description) {
            $data['description'] = $request->description;
        }

        return $data;
    }

    public static function createProduct(Request $request)
    {
        $data = self::dataRequest($request);

        $product = Product::create($data);

        if ($request->product_images) {
            $images_path = explode(',', $request->product_images);
            foreach ($images_path as $image_path) {
                ProductImage::create(['product_id' => $product->id, 'path' => "$image_path"]);
            }
        }

        if ($request->product_attrs_values) {
            $attrs_values = $request->product_attrs_values;
            $product->attributeValues()->sync($attrs_values);
        }
    }

    public function updateProduct(Request $request)
    {
        $data = self::dataRequest($request);

        $this->update($data);

        if ($request->product_attrs_values) {
            $attrs_values = $request->product_attrs_values;
            $this->attributeValues()->sync($attrs_values);
        } else {
            $this->attributeValues()->detach();
        }
    }
}
