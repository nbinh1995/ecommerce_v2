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
    public int $product_size_id;
    public float $product_total;

    public function __construct(array $input)
    {
        $this->product_id = $input['product_id'];
        $this->product_name = $input['product_name'];
        $this->product_image = $input['product_image'];
        $this->product_price = $input['product_price'];
        $this->product_amount = $input['product_amount'];
        $this->product_size_id = $input['product_size_id'];
        $this->product_total = $input['product_amount'] * $input['product_price'];
    }

    public function getNameProductSizes(object $sizes): ?string
    {
        foreach ($sizes as $size) {
            if ($size->id == $this->product_size_id) {
                return $size->name;
            }
        }
    }
}
