<?php

namespace App;

use App\Facades\Collecting\ProductCollectingFacade;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;

require 'vendor/autoload.php';

class Scrape
{
    private ProductCollectingFacade $facade;

    public function __construct()
    {
        $this->facade = new ProductCollectingFacade();
    }

    public function run(): void
    {
        $this->facade->collect();
    }
}

$scrape = new Scrape();
$scrape->run();
