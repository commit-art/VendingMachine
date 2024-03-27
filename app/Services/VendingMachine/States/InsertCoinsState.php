<?php

namespace App\Services\VendingMachine\States;

class InsertCoinsState extends StateAbstract
{
    public function interact(): void
    {
        $amount = $this->console->ask('Insert coins:');

        if ($this->isValid($amount)) {
            $this->machine->insertCoins($amount);
            $this->console->info('Your current balance: ' . $this->machine->getBalance());
        } else {
            $this->console->warn("These coins doesn't supported!  ");
        }
    }

    protected function isValid($amount): bool
    {
        $coins = $this->machine->getPossibleCoins();

        return in_array($amount, $coins);
    }
}
