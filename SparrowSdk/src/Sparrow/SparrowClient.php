<?php
namespace Sparrow;

require_once "SparrowResponse.php";
require_once "SparrowClient.generated.php";

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\Promise;
use Psr\Http\Message\ResponseInterface;

interface SparrowResponsePromise{
    function then(callable $onFulfilled = null);
    
    /**
     * @return SparrowResponse Sparrow Respone Data
     */
    function wait();
}

class SparrowClient
{
    use SparrowClientGenerated;

    const URL = "https://secure.sparrowone.com/Payments/Services_api.aspx";

    protected $client;

    protected $apiKey;

    public function __construct($apiKey)
    {
        $this->client = new Client();
        $this->apiKey = $apiKey;
    }

    protected function makeRequest($dataRaw)
    {
        // Remove Empty Values from $data
        $data = [];
        
        foreach($dataRaw as $k=>$v){
            if($v){
                $data[$k] = $v;
            }
        }
        
        $promise = new Promise(function () use (&$request) {
            $request->wait();
        });
        
        $request = $this->client->requestAsync("POST", self::URL, [
            "form_params" => $data
        ]);
        
        $request->then(function (ResponseInterface $res) use (&$promise, &$data) {
            $body = (string) $res->getBody();
            $values = $this->parseResponse($body);
            $result = new SparrowResponse($values, $data);
            $promise->resolve($result);
        }, function (RequestException $e) use (&$promise) {
            // TODO: Handle Error
            echo $e->getMessage() . "\n";
            echo $e->getRequest()
                ->getMethod();
            
            $promise->reject("Request Failed: " . $e->getMessage());
        });
        
        return $promise;
    }

    private function parseResponse(string $body)
    {
        $parts = explode("&", $body);
        
        $values = [];
        foreach ($parts as $p) {
            $keyValue = explode("=", $p);
            $key = $keyValue[0];
            $value = $keyValue[1];
            $values[$key] = $value;
        }
        return $values;
    }

    public function simpleSale_example($amount, $cardNum, $cardExp, $cvv = null)
    {
        $data = [];
        $data["transType"] = "sale";
        $data["mKey"] = $this->apiKey;
        
        $data["amount"] = $amount;
        $data["cardnum"] = $cardNum;
        $data["cardexp"] = $cardExp;
        $data["cvv"] = $cvv;
        
        return $this->makeRequest($data);
    }
    
    public function addCustomer_example(AddCustomerParams $params)
    {
        $data = [];
        
        $data["transtype"] = "addcustomer";
        $data["mkey"] = $this->apiKey;
        $data["customerid"] = $params->customerId;
        $data["note"] = $params->note;
        
        $data["defaultaddress1"] = $params->defaultAddress->address1;
        $data["clientuseremail"] = $params->clientAccount->clientUserEmail;
        foreach ($params->paymentTypes as $i=>$x){
            $data["bankname_"+ $i] = $x->bankAccount->clientUserEmail;
        }
        
        return $this->makeRequest($data);
    }
}
