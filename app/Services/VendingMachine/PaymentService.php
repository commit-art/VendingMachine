<?php

namespace App\Services\VendingMachine;

use App\Models\Payment;
use Exception;
use Illuminate\Support\Facades\DB;

class PaymentService
{
    protected float $amount = 0;

    public function create(ProductService $service): void
    {
        if ($service->isProductAvailable()) {
            throw new Exception('Product is not available');
        }

        $product = $service->get();

        if (!$this->hasEnoughFunds($product)) {
            throw new Exception('Inefficient funds');
        }

        DB::beginTransaction();

        $product->quantity -= 1;
        $product->save();

        $this->amount -= $product->price;

        Payment::create([
            'product_id' => $product->id,
            'price' => $product->price,
            'balance' => $this->amount
        ]);

        DB::commit();
    }

    public function getBalance(): float
    {
        return $this->amount;
    }

    public function debitFunds(float $amount): void
    {
        $this->amount += $amount;
    }

    public function refund(): void
    {
        $this->amount = 0;
    }

    private function hasEnoughFunds($product): bool
    {
        return $this->amount >= $product->price;
    }
}
