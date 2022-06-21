<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;

class ScraperCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scraper:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start Web Scraper to get Content from a webstite';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $client = new Client(HttpClient::create(['timeout' => 60]));
        $crawler = $client->request('GET', 'https://www.symfony.com/blog/');

        // Get the latest post in this category and display the titles
        $crawler->filter('h2 > a')->each(function ($node) {
            print $node->text()."\n";
        });

    }
}
