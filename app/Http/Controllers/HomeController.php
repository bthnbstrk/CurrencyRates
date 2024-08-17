<?php

namespace App\Http\Controllers;


use App\Services\FetchCurrency\CurrencyService;

class HomeController extends Controller
{
    public function index()
    {
        $data = [];
        $data['currencies'] =  CurrencyService::calculate();
        return view('home',$data);
    }


}
