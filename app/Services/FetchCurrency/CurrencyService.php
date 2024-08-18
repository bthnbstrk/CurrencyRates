<?php

namespace App\Services\FetchCurrency;

use App\Services\FetchCurrency\Interfaces\ICurrencyProvider;
use Illuminate\Support\Facades\Redis;

class CurrencyService
{
    public static function saveCurrencyData(ICurrencyProvider $currencyProvider): void
    {
        $currencyProvider->saveData();
    }

    private static function foundRedisKeys(): array
    {
        $cursor = 0;
        $pattern = 'CURRENCY_SERVICE_PROVIDER_*';
        $keys = [];

        do {
            $result = Redis::scan($cursor, ['match' => $pattern]);
            $cursor = $result[0];
            $keys = array_merge($keys, $result[1]);

        } while ($cursor != 0);

        return $keys;
    }

    public static function fetchDataFromRedis(): array
    {
        $redisKeys = self::foundRedisKeys();
        $currencyData = [];
        foreach ($redisKeys as $keyFullName) {
            $keywords = explode('_', $keyFullName);
            $key = implode('_', array_slice($keywords, 2));
            $currencyData[$key] = Redis::hgetall($key);
        }

        return $currencyData;
    }

    public static function foundLowCurrencyFromRedis() : array
    {
        $data = self::fetchDataFromRedis();
        $minValues = [];

        foreach ($data as $array) {
            foreach ($array as $key => $value) {
                if (!isset($minValues[$key])) {
                    $minValues[$key] = $value;
                } else {
                    $minValues[$key] = min($minValues[$key], $value);
                }
            }
        }

        return $minValues;
    }

}
