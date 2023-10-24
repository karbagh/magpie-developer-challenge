<?php

namespace App\Entities\Product;

use App\Entities\Entity;

class Product extends Entity
{
    /**
     * @var string
     */
    private string $title;
    /**
     * @var float
     */
    private float $price;
    /**
     * @var string
     */
    private string $imageUrl;
    /**
     * @var int
     */
    private int $capacityMB;
    /**
     * @var string
     */
    private string $colour;
    /**
     * @var string
     */
    private string $availabilityText;
    /**
     * @var bool
     */
    private bool $isAvailable;
    /**
     * @var string
     */
    private string $shippingText;
    /**
     * @var string
     */
    private string $shippingDate;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(string $imageUrl): void
    {
        $this->imageUrl = $imageUrl;
    }

    public function getCapacityMB(): int
    {
        return $this->capacityMB;
    }

    public function setCapacityMB(int $capacityMB): void
    {
        $this->capacityMB = $capacityMB;
    }

    public function getColour(): string
    {
        return $this->colour;
    }

    public function setColour(string $colour): void
    {
        $this->colour = $colour;
    }

    public function getAvailabilityText(): string
    {
        return $this->availabilityText;
    }

    public function setAvailabilityText(string $availabilityText): void
    {
        $this->availabilityText = $availabilityText;
    }

    public function isAvailable(): bool
    {
        return $this->isAvailable;
    }

    public function setIsAvailable(bool $isAvailable): void
    {
        $this->isAvailable = $isAvailable;
    }

    public function getShippingText(): string
    {
        return $this->shippingText;
    }

    public function setShippingText(string $shippingText): void
    {
        $this->shippingText = $shippingText;
    }

    public function getShippingDate(): string
    {
        return $this->shippingDate;
    }

    public function setShippingDate(string $shippingDate): void
    {
        $this->shippingDate = $shippingDate;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'title' => $this->getTitle(),
            'price' => $this->getPrice(),
            'imageUrl' => $this->getImageUrl(),
            'capacityMB' => $this->getCapacityMB(),
            'colour' => $this->getColour(),
            'availabilityText' => $this->getAvailabilityText(),
            'isAvailable' => $this->isAvailable(),
            'shippingText' => $this->getShippingText(),
            'shippingDate' => $this->getShippingDate(),
        ];
    }
}
