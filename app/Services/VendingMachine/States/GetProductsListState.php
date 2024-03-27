<?php

namespace App\Services\VendingMachine\States;

use App\Services\VendingMachine\ProductService;

class GetProductsListState extends StateAbstract
{
    public function interact(): void
    {
        $products = app(ProductService::class)->getAll();

        $answer = $this->console->choice(
            ' Product list. Select what do you want please',
            $products
        );

        $this->machine->setProductId($products[$answer]);
    }

}
