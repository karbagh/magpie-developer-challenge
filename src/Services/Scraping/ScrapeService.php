<?php

namespace App\Services\Scraping;

use App\Config\Scrape\PaginationScrapeConfig;
use App\Config\Scrape\ProductScrapeConfig;
use App\Entities\Scrapes\Product\ScrapeProduct;
use Symfony\Component\DomCrawler\Crawler;

class ScrapeService
{
    public function parsePagesCount(Crawler $crawler): int
    {
        return $crawler->filter(PaginationScrapeConfig::NAVIGATION_BLOCK)->count();
    }

    public function parseProducts(Crawler $crawler): array
    {
        return $crawler->filter(ProductScrapeConfig::BASE_BLOCK)->each(function (Crawler $item) {
            $uri = rtrim(dirname($item->getUri()), '/');
            return $item->filter(ProductScrapeConfig::ITEM_BLOCK)
                ->each(function (Crawler $color) use ($item, $uri) {
                    $scrapeProduct = new ScrapeProduct();
                    $scrapeProduct->setTitle($item->filter(ProductScrapeConfig::NAME_BLOCK)->text());
                    $scrapeProduct->setCapacityMB($item->filter(ProductScrapeConfig::CAPACITY_BLOCK)->text());
                    $scrapeProduct->setImageUrl(
                        $uri . str_replace('..', '',$item->filter(ProductScrapeConfig::IMG_BLOCK)
                            ->attr('src'))
                    );
                    $scrapeProduct->setPrice($item->filter(ProductScrapeConfig::PRICE_BLOCK)->text());
                    $scrapeProduct->setColour($color->attr(ProductScrapeConfig::COLOR_BLOCK));
                    $scrapeProduct->setAvailabilityText($item->filter(ProductScrapeConfig::AVAILABILITY_BLOCK)->eq(0)->text());
                    $scrapeProduct->setShippingText($item->filter(ProductScrapeConfig::SHIPPING_TEXT_BLOCK)->eq(1)->text("No Data"));
                    return $scrapeProduct;
                });
        });
    }
}