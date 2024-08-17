<?php

namespace App\Services\FetchCurrency\Adapters;

use App\Services\FetchCurrency\Interfaces\CurrencyProvider;
use App\Services\FetchCurrency\Providers\ProviderB;

class BProviderAdapter implements CurrencyProvider
{
    function saveData()
    {
        $providerB = new ProviderB("https://run.mocky.io/v3/cde25982-a259-47d2-90d8-978f1216134c","PROVIDER_B");
        $providerB->fetchCurrencyRates();
        $providerB->saveCurrencyRate();
    }

}
