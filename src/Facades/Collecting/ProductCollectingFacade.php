<?php

namespace App\Facades\Collecting;

use App\Helpers\Scrape\ScrapeHelper;
use App\Services\Collecting\ProductFetchingService;
use App\Services\Scraping\ScrapeService;

class ProductCollectingFacade
{
    private ScrapeService $scrapeService;
    private ProductFetchingService $fetchingService;

    const DOCUMENT_URI = 'https://www.magpiehq.com/developer-challenge/smartphones';

    public function __construct()
    {
        $this->scrapeService = new ScrapeService();
        $this->fetchingService = new ProductFetchingService();
    }
    public function collect(): void
    {
        $document = ScrapeHelper::fetchDocument(self::DOCUMENT_URI);

        $pagesCount = $this->scrapeService->parsePagesCount($document);

        $page = 1;
        $products = [];
        while ($page < $pagesCount) {
            $smartphonePage = ScrapeHelper::fetchDocument(self::DOCUMENT_URI . "?page=$page");
            $products []= array_merge(...$this->scrapeService->parseProducts($smartphonePage));
            $page++;
        }

        $productCollection = $this->fetchingService->fetch($products);
        file_put_contents('output.json', json_encode($productCollection->toArray()));
    }
}