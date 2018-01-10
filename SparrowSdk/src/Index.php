<?php
require_once "../vendor/autoload.php";
require_once "./Sparrow/SparrowClient.php";

use GuzzleHttp\Promise\Promise;
use Sparrow\Product;
use Sparrow\SparrowClient;
use Sparrow\AddCustomerParams;
use Sparrow\ClientAccount;
use Sparrow\AdvancedSaleParams;

// Promise Test
function promiseTest(){
    $promise = new Promise(function () use (&$promise) {
        $promise->resolve(null);
    });
    
    $p1 = $promise->then(function($value){
        // echo $value;
        $promise = new Promise(function () use (&$promise, $value) {
            $promise->resolve($value . ' 1');
        });
        return $promise;
    });
    
    $p2 = $p1->then(function($value){
        echo $value;
        return $promise = new Promise(function () use (&$promise, $value) {$promise->resolve($value . ' 2');});
    });
        
    $final = $p2->then(function($value){
        echo $value;
        return $promise = new Promise(function () use (&$promise, $value) {$promise->resolve($value . ' 3');});
    });
        
    $promiseResult = $final->wait();
    
    echo $promiseResult;
}

promiseTest();

// Tests
$date = new DateTime('2018-10');
$d = date_format($date,"my");

// Manual Test
$client = new SparrowClient("CUK5YODHVAZHFBM6KESZO1J4");
// $result = $client->makeRequest([
//     "transType" => "sale",
//     "mKey" => "CUK5YODHVAZHFBM6KESZO1J4",
//     "amount" => "9.97",
//     "cardNum" => "4111111111111111",
//     "cardExp" => "1018",
//     "cvv" => "123"
// ]);

$result = $client->simpleSale_example("9.99", "4111111111111111", "1018");

$result->then(function ($values) {
    var_dump($values);
});

// Example call
$params = new AddCustomerParams();
$params->clientAccount = new ClientAccount();
$params->clientAccount->clientUserEmail = 'test@test.com';

// $p = new Products();


$result2 = $client->addCustomer($params);

// Example call2
$params2 = new AdvancedSaleParams();
$params2->clientAccount = new ClientAccount();
$params2->clientAccount->clientUserEmail = 'test@test.com';
$params2->products[0] = new Product();
$params2->products[0]->amount = 1.0;

// $p = new Products();


$result3 = $client->advancedSale($params2);
