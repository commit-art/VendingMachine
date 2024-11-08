<?php

namespace App\Console\Commands;

use App\Services\VendingMachine\VendingMachineService;
use Illuminate\Console\Command;

class VendingMachineEngine extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:vending-machine-engine';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Handle user actions';

    /**
     * Execute the console command.
     */
    public function handle(VendingMachineService $machine)
    {
        $this->alert('WELCOME TO VENDING MACHINE SERVICE');
        $this->info('Machine accept only these coins:');

        $this->line(VendingMachineService::getPossibleCoins());

        while (true) {

            $action = $this->choice(
                'Please select an action: ',
                VendingMachineService::getActions()
            );

            $state = $machine->getState($action, $this);

            $state->interact();
        }
    }
}
