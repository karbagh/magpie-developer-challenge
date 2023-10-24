## Installing and Running environment

* `docker-compose up -d`
* `composer install`


## Configuration

As in scrapping workflow, may will change some parts of front: classes, ids or elements, in this case we
have some config classes, to change any attribute listed.

`App\Config\Scrape\PaginationScrapeConfig` - for change configs of paginate scraping logic.
`App\Config\Scrape\ProductScrapeConfig` - for change configs of products scraping logic.

## Running Project

Open container of workspace terminal, and run  command `php src/Scrape.php`

## Result

After all flow, in `output.json` fill be available the result of scraped products.    