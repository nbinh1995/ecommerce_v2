<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

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

    public function attrs()
    {
        return $this->belongsToMany(Attribute::class, CategoryAttr::class, CategoryAttr::FOREIGN_KEY_CATEGORY, CategoryAttr::FOREIGN_KEY_ATTRIBUTE);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getCategoryAttrs()
    {
        return $this->load('attrs')->attrs;
    }

    public function getFullCategoryAttrs()
    {
        $attrs = $this->getCategoryAttrs();
        $attrs_values = [];
        foreach ($attrs as $attr) {
            $attrs_values["$attr->attr_name"] = $attr->getAttrValues();
        }

        return $attrs_values;
    }

    public function toStringCategoryAttrID(): string
    {
        $attrs = $this->getCategoryAttrs();
        $string = [];
        foreach ($attrs as $attr) {
            $string[] = $attr->id;
        }
        return implode(",", $string);
    }

    public function toHtmlCategoryAttrs(): string
    {
        $attrs = $this->getCategoryAttrs();
        $html = [];
        foreach ($attrs as $attr) {
            $html[] = "<span class='btn btn-outline-primary btn-xs'>{$attr->attr_name}</span>";
        }
        return implode(" ", $html);
    }

    public static function createCategory(array $request): void
    {
        $data = [
            'name' => $request['name'],
            'meta_title' => $request['meta_title']
        ];
        if ($request['Slug']) {
            $data['Slug'] = $request['Slug'];
        } else {
            $data['Slug'] = Str::slug($request['name']);
        }
        $category = Category::create($data);
        if (isset($request['attrs'])) {
            $category->attrs()->sync($request['attrs']);
        }
    }

    public static function updateCategory(array $request, Category $category): void
    {
        $data = [
            'name' => $request['name'],
            'meta_title' => $request['meta_title']
        ];
        if ($request['Slug']) {
            $data['Slug'] = $request['Slug'];
        } else {
            $data['Slug'] = Str::slug($request['name']);
        }
        $category->update($data);

        if (isset($request['attrs'])) {
            $category->attrs()->sync($request['attrs']);
        } else {
            $category->attrs()->detach();
        }
    }

    public static function deleteCategory(Category $category): void
    {
        $category->attrs()->detach();
        $category->delete();
    }
}
