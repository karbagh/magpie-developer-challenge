<?php

namespace App\Entities\Scrapes\Product;

use App\Enums\Product\ProductAvailabilityEnum;
use App\Helpers\Collector\ProductCollectorHelper;

class ScrapeProduct
{
    /**
     * @var string
     */
    private string $title;
    /**
     * @var string
     */
    private string $price;
    /**
     * @var string
     */
    private string $imageUrl;
    /**
     * @var string
     */
    private string $capacityMB;
    /**
     * @var string
     */
    private string $colour;
    /**
     * @var string
     */
    private string $availabilityText;
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
        return (float) preg_replace('/[^0-9.]/', '', $this->price);
    }

    public function setPrice(string $price): void
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

    public function getCapacityMB(): string
    {
        return ProductCollectorHelper::parseToMB($this->capacityMB);
    }

    public function setCapacityMB(string $capacityMB): void
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

    public function getAvailability(): bool
    {
        return (bool) ProductAvailabilityEnum::tryFrom($this->getAvailabilityText())?->isAvailable();
    }

    public function getAvailabilityText(): string
    {
        return ProductCollectorHelper::removePrefixInText($this->availabilityText, 'Availability: ');
    }

    public function setAvailabilityText(string $availabilityText): void
    {
        $this->availabilityText = $availabilityText;
    }

    public function getShippingText(): string
    {
        return $this->shippingText;
    }

    public function setShippingText(string $shippingText): void
    {
        $this->shippingText = $shippingText;
    }

    public function getShippingDate(): ?string
    {
        return ProductCollectorHelper::parseShippingDate($this->getShippingText());
    }
}