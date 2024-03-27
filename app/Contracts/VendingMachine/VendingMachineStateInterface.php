<?php

namespace App\Contracts\VendingMachine;

interface VendingMachineStateInterface
{
    public function interact(): void;
}
