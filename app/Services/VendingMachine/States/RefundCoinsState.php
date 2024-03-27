<?php

namespace App\Services\VendingMachine\States;

class RefundCoinsState extends StateAbstract
{
    public function interact(): void
    {
        $this->machine->refundCoins();
        $this->console->info('Your current balance: ' . $this->machine->getBalance());
    }
}
