<?php

namespace App\Services\VendingMachine\States;

class PurchaseState extends StateAbstract
{
    public function interact(): void
    {
        $this->machine->purchase();

        $this->console->info('Product is purchased: ');
        $this->console->info('Your current balance: ' . $this->machine->getBalance());
    }
}
