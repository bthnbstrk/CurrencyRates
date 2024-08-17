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
            return $e->getMessage();
        }
    }
    public function save($data)
    {
        try {
            $currency = new Currency();
            $currency->name = $data['fullname'];
            $currency->provider = $this->getProviderName();
            $currency->symbol = $data['symbl'];
            $currency->short_code = $data['shrtCode'];
            $currency->value = $data['amount'];
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
    }

}
