<?php

namespace App\Entities;

abstract class Entity
{
    /**
     * @return array
     */
    public abstract function toArray(): array;
}