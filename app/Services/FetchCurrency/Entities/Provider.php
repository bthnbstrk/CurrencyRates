<?php

namespace App\Services\FetchCurrency\Entities;

class Provider
{
    private string $apiUrl;
    private string $providerName;

    public function __construct(string $apiUrl, string $providerName)
    {
        $this->apiUrl = $apiUrl;
        $this->providerName = $providerName;
    }

    /**
     * @return string
     */
    public function getApiUrl(): string
    {
        return $this->apiUrl;
    }

    /**
     * @param string $apiUrl
     */
    public function setApiUrl(string $apiUrl): void
    {
        $this->apiUrl = $apiUrl;
    }

    /**
     * @return string
     */
    public function getProviderName(): string
    {
        return $this->providerName;
    }

    /**
     * @param string $providerName
     */
    public function setProviderName(string $providerName): void
    {
        $this->providerName = $providerName;
    }
}
