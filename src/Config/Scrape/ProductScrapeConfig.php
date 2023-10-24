<?php

namespace App\Config\Scrape;

class ProductScrapeConfig
{
    const BASE_BLOCK = 'div#products div.product';

    const ITEM_BLOCK = 'span.border.border-black.rounded-full.block';
    const NAME_BLOCK = 'span.product-name';
    const CAPACITY_BLOCK = 'span.product-capacity';
    const IMG_BLOCK = 'img.mx-auto';
    const PRICE_BLOCK = 'div.block.text-center.text-lg';
    const COLOR_BLOCK = 'data-colour';
    const AVAILABILITY_BLOCK = 'div.text-sm.block.text-center';
    const SHIPPING_TEXT_BLOCK = 'span.border.border-black.rounded-full.block';
}