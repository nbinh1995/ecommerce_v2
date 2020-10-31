<?php

namespace App\Services;

use App\Models\Size;
use Illuminate\Support\Facades\Log;

class Cart
{
    public int $product_id;
    public string $product_name;
    public string $product_image;
    public float $product_price;
    public int $product_amount;
    public string $product_attrs;
    public float $product_total;

    public function __construct(array $input)
    {
        $this->product_id = $input['product_id'];
        $this->product_name = $input['product_name'];
        $this->product_image = $input['product_image'];
        $this->product_price = $input['product_price'];
        $this->product_amount = $input['product_amount'];
        $this->product_attrs = $input['product_attrs'];
        $this->product_total = $input['product_amount'] * $input['product_price'];
    }

    public function getAttributeToString($attrs)
    {
        $attr_values_id = explode(',', $this->product_attrs);

        foreach ($attr_values_id as $attr_value_id) {
            $attr = $attrs->firstWhere('id', $attr_value_id);
            $result[] = "<span class='tag-attr'><b>{$attr->attr_name}:</b> $attr->attr_value</span>";
        }
        return implode(' ', $result);
    }
}
