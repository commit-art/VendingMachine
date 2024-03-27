<?php

namespace App\Contracts\VendingMachine;

use Illuminate\Console\Command;

interface VendingMachineInterface
{
    public function insertCoins(float $amount);
    public function refundCoins(): void;
    public function purchase(): void;
    public function setProductId(int $productId): void;
    public function getState(string $action, Command $console): VendingMachineStateInterface;

    public static function getPossibleCoins(): array;
    public static function getActions(): array;
}
