<?php

namespace App\Console\Commands;

use App\Services\FetchCurrency\Adapters\AProviderAdapterI;
use App\Services\FetchCurrency\Adapters\BProviderAdapterI;
use App\Services\FetchCurrency\CurrencyService;
use Illuminate\Console\Command;

class FetchCurrencyData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-currency-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command line retrieves prices from currency information service providers and saves them to the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->warn('Please make sure you have a backup of the related database table before proceeding!');
        $this->warn('Table: tbl_currencies');

        if ($this->confirm('Are you sure ?')) {
            $progressBar = $this->output->createProgressBar(2);
            $progressBar->setFormat('debug');
            $progressBar->start();

            CurrencyService::saveCurrencyData(new AProviderAdapterI());
            $progressBar->advance();
            CurrencyService::saveCurrencyData(new BProviderAdapterI());
            $progressBar->advance();

            $progressBar->finish();

            echo PHP_EOL;
            echo PHP_EOL;
            $this->info('fetch-currency-data command finished work'.PHP_EOL);
        } else {
            $this->warn('Operation cancelled!');
        }

    }
}
