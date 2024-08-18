<?php

namespace App\Services\FetchCurrency\Adapters;

use App\Services\FetchCurrency\Interfaces\ICurrencyProvider;
use App\Services\FetchCurrency\Providers\ProviderA;

class AProviderAdapter implements ICurrencyProvider
{
    function saveData()
    {
        $providerA = new ProviderA("https://run.mocky.io/v3/9073c9e5-b8ef-41d9-a6b3-21dc32d28be0","PROVIDER_A");
        $providerA->fetchCurrencyRates();
        $providerA->saveCurrencyRate();
    }
}
