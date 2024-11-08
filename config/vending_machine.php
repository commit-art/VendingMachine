<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */

    'coins' => [0.1, 0.05, 0.10, 0.25, 0.50, 1.00],

    'actions' => [
        '1' => 'Insert Coins',
        '2' => 'Get Products List',
        '3' => 'Refund Coins',
        '4' => 'Purchase'
    ]
];
