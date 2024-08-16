<?php

namespace App\Http\Controllers;


use App\Services\FetchCurrency\CurrencyRateServices\CurrencyRateServiceA;

class HomeController extends Controller
{
    public function index()
    {
        $serviceA = new CurrencyRateServiceA("https://run.mocky.io/v3/cde25982-a259-47d2-90d8-978f1216134c");
        $x = $serviceA->fetchRates();
        //return view('home');
        dd($x);
    }


}
