<?php

namespace App\Services\FetchCurrency\Abstracts;

use Illuminate\Support\Facades\Http;

abstract class ExchangeRate
{
    abstract protected function parseRates(array $currencyData);

    protected string $apiUrl;

    public function __construct(string $apiUrl)
    {
        $this->apiUrl = $apiUrl;
    }

    public function fetchRates()
    {
        try {
            $response = Http::get($this->apiUrl);
            return $response->json();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
