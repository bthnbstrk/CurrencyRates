<?php

namespace App\Services\FetchCurrency\Providers;

use App\Models\Currency;
use App\Services\FetchCurrency\Entities\Provider;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class ProviderB extends Provider
{

    public function fetchCurrencyRates()
    {
        try {
            $response = Http::get($this->getApiUrl());
            return $response->json();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function save($data)
    {
        try {
            $currency = new Currency();
            $currency->name = isset($data['name']) ?? $data['name'];
            $currency->provider = $this->getProviderName();
            $currency->symbol =  isset($data['symbol']) ?? $data['symbol'];
            $currency->short_code = isset($data['shortCode']) ?? $data['shortCode'];
            $currency->value = isset($data['price']) ?? $data['price'];
            $currency->save();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }


    public function saveCurrencyRate()
    {
        $responseData = $this->fetchCurrencyRates();
        $redisData = [];
        foreach ($responseData as $data) {
            $redisData[$data['shortCode']] = $data['price'];
            $this->save($data);
        }

        Redis::hmset($this->getProviderName(), $redisData);
        Log::info($this->getProviderName() . " was written to redis " . json_encode($redisData));
    }
}
