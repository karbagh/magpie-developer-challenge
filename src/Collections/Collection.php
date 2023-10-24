<?php

namespace App\Collections;

abstract class Collection
{
    /**
     * @param array $products
     * @return Collection
     */
    public abstract function setItems(array $products): self;

    /**
     * @return array
     */
    public abstract function getItems(): array;

    /**
     * @return array
     */
    public abstract function toArray(): array;
}