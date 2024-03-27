<?php

namespace App\Services\VendingMachine;

use App\Contracts\VendingMachine\VendingMachineInterface;
use App\Contracts\VendingMachine\VendingMachineStateInterface;
use Exception;
use Illuminate\Console\Command;

class VendingMachineService implements VendingMachineInterface
{
    protected int $productId = 0;

    public function __construct(protected PaymentService $paymentService)
    {
    }

    public function refundCoins(): void
    {
        $this->paymentService->refund();
    }

    public function getBalance(): float
    {
        return $this->paymentService->getBalance();
    }

    public function insertCoins(float $amount): void
    {
        $this->paymentService->debitFunds($amount);
    }

    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }

    /**
     * @throws Exception
     */
    public function purchase(): void
    {
        if (!$this->productId) {
            throw new Exception('Product is not selected');
        }

        $productService = app(
            ProductService::class,
            ['productId' => $this->productId]
        );

        $this->paymentService->create($productService);
    }

    public static function getPossibleCoins(): array
    {
        return config('vending_machine.coins');
    }

    public function getState(string $action, Command $console): VendingMachineStateInterface
    {
        $action = str_replace(' ', '', $action);

        $action = "App\Services\VendingMachine\States\\".$action.'State';

        return new $action($console, $this);
    }

    public static function getActions(): array
    {
        return config('vending_machine.actions');
    }

    public function __call($name, $arguments)
    {
        logs()->critical($name,[$arguments]);

        throw new Exception('Action does not supported');
    }
}
