<?php

namespace App\Collections\Product;

use App\Collections\Collection;
use App\Entities\Product\Product;
use App\Entities\Scrapes\Product\ScrapeProduct;

class ProductCollection extends Collection
{
    private array $items = [];

    public function setItems(array $products): Collection
    {
        array_map(function (ScrapeProduct $item) {
            $product = new Product();
            $product->setTitle($item->getTitle());
            $product->setPrice($item->getPrice());
            $product->setImageUrl($item->getImageUrl());
            $product->setCapacityMB($item->getCapacityMB());
            $product->setColour($item->getColour());
            $product->setAvailabilityText($item->getAvailabilityText());
            $product->setIsAvailable($item->getAvailability());
            $product->setShippingText($item->getShippingText());
            $product->setShippingDate($item->getShippingDate());
            $this->items[] = $product;
        }, $products);

        return $this;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function toArray(): array
    {
        return array_map(function (Product $item) {
            return $item->toArray();
        }, $this->items);
    }
}