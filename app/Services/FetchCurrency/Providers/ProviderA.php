<?php

namespace App\Services\FetchCurrency\Providers;


use App\Models\Currency;
use App\Services\FetchCurrency\Entities\Provider;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class ProviderA extends Provider
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
            $currency->name = isset($data['fullname']) ?? $data['fullname'];
            $currency->provider = $this->getProviderName();
            $currency->symbol = isset($data['symbl']) ?? $data['symbl'];
            $currency->short_code =isset($data['shrtCode']) ?? $data['shrtCode'];
            $currency->value = isset($data['amount']) ?? $data['amount'];
            $currency->save();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function saveCurrencyRate()
    {
        $responseData = $this->fetchCurrencyRates();
        $redisData = [];
        foreach ($responseData as $data){
            $redisData[$data['shrtCode']] = $data['amount'];
            $this->save($data);
        }

        Redis::hmset($this->getProviderName(),$redisData);
        Log::info($this->getProviderName() . " was written to redis " . json_encode($redisData));
    }

}
