<?php

namespace App\Services\Collecting;

use App\Collections\Product\ProductCollection;
use Iterator;

class ProductFetchingService
{
    public function fetch(array $products): ProductCollection
    {
        return (new ProductCollection())->setItems(array_merge(...$products));
    }
}