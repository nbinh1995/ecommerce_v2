<?php

namespace App\Services;

use Illuminate\Http\Request;

class CartList
{
    public int $count = 0;
    public float $total = 0;
    public ?array $list = null;


    protected function arrayProductSizeAndProductID(): array
    {
        return array_map(function ($object) {
            return [$object->product_id, $object->product_attrs];
        }, $this->list);
    }

    public function checkHasNode(array $productKey): bool
    {
        return empty($this->list) ? false : in_array($productKey, $this->arrayProductSizeAndProductID());
    }

    public function indexOfList(array $productKey): int
    {
        $index = array_search($productKey, $this->arrayProductSizeAndProductID());
        return $index;
    }

    public function addNewNode(array $input): void
    {
        $product = new Cart($input);
        $this->list[] = $product;

        $this->count = array_reduce($this->list, function ($count, $product) {
            $count += $product->product_amount;
            return (int)$count;
        });

        $this->total = array_reduce($this->list, function ($total, $product) {
            $total += $product->product_total;
            return (float)$total;
        });
    }

    public function addTheSameNode(array $productKey, int $product_amount): void
    {
        $index_add = $this->indexOfList($productKey);
        $this->list[$index_add]->product_amount += $product_amount;
        $this->list[$index_add]->product_total = $this->list[$index_add]->product_amount * $this->list[$index_add]->product_price;

        $this->count = array_reduce($this->list, function ($count, $product) {
            $count += $product->product_amount;
            return (int)$count;
        });

        $this->total = array_reduce($this->list, function ($total, $product) {
            $total += $product->product_total;
            return (float)$total;
        });
    }

    public function updateProductAmountNode(array $productKey, int $product_amount): void
    {
        $index_update = $this->indexOfList($productKey);
        $this->list[$index_update]->product_amount = $product_amount;
        $this->list[$index_update]->product_total = $this->list[$index_update]->product_amount * $this->list[$index_update]->product_price;

        $this->count = array_reduce($this->list, function ($count, $product) {
            $count += $product->product_amount;
            return (int)$count;
        });

        $this->total = array_reduce($this->list, function ($total, $product) {
            $total += $product->product_total;
            return (float)$total;
        });
    }

    public function removeNode(array $productKey): void
    {

        $index_remove = $this->indexOfList($productKey);
        array_splice($this->list, $index_remove, 1);

        if ($this->list) {
            $this->count = array_reduce($this->list, function ($count, $product) {
                $count += $product->product_amount;
                return (int)$count;
            });

            $this->total = array_reduce($this->list, function ($total, $product) {
                $total += $product->product_total;
                return (float)$total;
            });
        } else $this->clearNode();
    }

    public function clearNode(): void
    {
        $this->count = 0;
        $this->list = null;
        $this->total = 0;
    }
}
