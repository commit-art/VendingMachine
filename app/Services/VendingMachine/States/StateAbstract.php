<?php

namespace App\Services\VendingMachine\States;

use App\Contracts\VendingMachine\VendingMachineInterface;
use App\Contracts\VendingMachine\VendingMachineStateInterface;
use Illuminate\Console\Command;

class StateAbstract implements VendingMachineStateInterface
{
    public function __construct(
        protected Command $console,
        protected VendingMachineInterface $machine,
    ){
    }

    public function interact(): void
    {
        // TODO: Implement interact() method.
    }
}
