<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'product_id',
        'price',
        'balance',
    ];

    public function product(): void
    {
        $this->belongsTo(Product::class);
    }
}
