<?php

namespace App\Services\VendingMachine;

use App\Models\Product;

class ProductService
{
    protected Product $product;

    public function __construct(int $productId = null)
    {
        if ($productId) {
            $this->product = Product::findOrFail($productId);
        }
    }

    public function getAll(): array
    {
        $data = Product::all()->map(function ($product) {
            return [$product->full_name => $product->id];
        })->toArray();

        return array_merge(...$data);
    }

    public function isProductAvailable(): bool
    {
        return $this->product->quantity === 0;
    }

    public function get(): Product
    {
        return $this->product;
    }
}
