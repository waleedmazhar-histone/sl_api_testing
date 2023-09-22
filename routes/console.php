<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use SellerLegend\Http\Client;
use SellerLegend\Http\SalesClient;
use SellerLegend\Http\UserClient;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

$config = [
    "client_id"     => "4",
    "client_secret" => "J0Zqr7WwFSVVVm6Uf2tIJHeRhbBQPlVlsrjWv17u",
    "refresh_token" => "def50200f7e1705b2d11641ed245a9ed65da1a82c25b25d0c9ce7fd03f2254781116cf065350d0139d06561275fd9c1df1ad0497e4f1bccac97e16c2dab29865facf8568bea4749ba0645c9332a3ff2da46d13464d582d7d0225d94ce309c58f7aaf42a41daac66bdb6c5356d934a62259443d7a01b370a0eda12a1f77de9e28b689ab755ee41c5cf1f40dd82c2dd795e841c7e4d8937e99a14cffb680e56d9ef35093de79e67be3749f5f926b32cf9fceb45cab21d685b60747894907892fec36005217efc4e751220990bed41f48bbf0c6ea47af013985a28cac4cbf32c1aa5998caca4c29b396fcff10a10ef7d08252926e5f88bb849923c0bc6e25720d94b8e3d21949b377f00b254af3828de026d63a41deb7ddcf74794a9b68e628db5fdb69f82600672b2e50a8bb51931b98e64a6318f5cdf87cd5af121622e41c8da0d924547f2545b6bbcd46c1aa45a46c2fc1818ab6e6f5aa1a3bc232eda978e32866",
    "access_token"  => "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI0IiwianRpIjoiYzQ1Yjc3NDNjZjc5ZTllZTAyMTNhNDgyYzZiZmFhYTk1N2Q2NmM5YzY1MTMyNTZlNzcwMzRjZjI0MGIwOWMzMWRmN2JmNDBmNGZkOGE1MDYiLCJpYXQiOjE2OTUzNjU1MzQuNzEzNDUyLCJuYmYiOjE2OTUzNjU1MzQuNzEzNDU3LCJleHAiOjE2OTY2NjE1MzQuNjgyMjEzLCJzdWIiOiIzIiwic2NvcGVzIjpbXX0.gggi2rBeFwnldoExdHJ32HBQTUo02y0FEftYkwmAqgXMBQcYMozOBIvH2otD3fL4xU8snX34L7sn3qALBDkgQqfYlQAnOv_6YciAGiytGpNWxY-EIDQHaeMak7Ns_uL-DSQJNcnvqcHOJ5V8XyiNwMt9FGwtBlrSsKz1XFpz-qoh9XcHmbiMa9KsGX5vvPa98UqrPjEa_oNRMMYYSLcF8dAEukUDDVswvufUsJhOOuDFH3iU65dgAHoUmvnDDJ_N6yFgE5q40giWzCw6lo5tVomSZUXumahVDZ0l45n-KvsLuuRzg6HRxYBDG6RxkQ34FiE9xDjl_EJB40-Yrw6YoNDR3B_MvxI6QA4g2a1N3V5TvAj0yKZ9YD8Na52Nx0Fr9RsAsV0z_39qnnibNTrJmvs4p-APZRXmh9IYKKZJvW5K9zXdn63P_JxtTJDDSU7fYD1SKXNBIHipnO-zy-yLv8z_OL6vPReJZ3zBvsZtFR6enHEUwk-phTEfNLzjwU4Mg1b0TeeNXs6nOaCkI8iysbGloIIO_WC3DjEJGT6-ihmUP0V_y2PvlWtMkinoDa4D256PCF_Aolj9RyHPCFKt7CXqYn5f1TQ9YHp3nnhGn2DQmmsZ93-IKxlr5pI_WHDvUAbM_wojmWjXHE3zeXaGAkbrBNhjI2pL6kSK3R3UGXk"
];

// Service status
Artisan::command('service-status', function () use ($config){

    $client = new Client($config);

    $request = $client->getServiceStatus();

    print_r($request);
});

// Refresh token
Artisan::command('refresh-token', function () use ($config){
    
    $client = new Client($config);

    $request = $client->refreshAccessToken();

    print_r($request);
});

// Account list 
Artisan::command('accounts-list', function () use ($config){
    
    $client = new UserClient($config);

    $request = $client->getAccountsList();

    print_r($request);
});

// Connections list: Not available in SDK client

/*Artisan::command('connections-list', function () use ($config){
    
    $client = new UserClient($config);

    $request = $client->getConnectionsList();

    print_r($request);
});*/

// Sales per day
Artisan::command('sales-per-day', function () use ($config){
   
    $client = new SalesClient($config);

    $request = $client->getSalesStatisticsByDay(
        "3",
        "1",
        "2022-03-16",
        "2022-03-16",
        1,
        500
    );

    print_r($request);
});

// Sales per day per product
Artisan::command('sales-per-day-per-product', function () use ($config){
   
    $client = new SalesClient($config);

    $request = $client->getSalesPerDayPerProduct(
        "3",
        "1",
        "2022-03-16",
        "2022-03-16",
        1,
        500
    );

    print_r($request);
});



