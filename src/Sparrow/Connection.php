<?php
  
namespace Sparrow;
use GuzzleHttp\Client;


class Connection 
{
  const ENV_MKEY_NAME='SPARROW_MKEY';
  
  static $defaults = [
    'endpoint'=> 'https://secure.sparrowone.com/Payments/Services_api.aspx',
    'mkey'=>null,
    'timeout'=>30,
  ];
  
  public function __construct($options_or_mkey=null)
  {
    if($options_or_mkey==null) $options_or_mkey=self::$defaults;
    if(is_string($options_or_mkey)) $options_or_mkey = ['mkey'=>$options_or_mkey];
    if(!is_array($options_or_mkey))
    {
      throw new ConnectionException("Connection constructor parameters must be a string (mkey) or array.");
    }
    $config = array_merge(self::$defaults, $options_or_mkey);
    $config = json_decode(json_encode($config), FALSE);
    if(!$config->mkey && isset($_ENV[self::ENV_MKEY_NAME])) $config->mkey = $_ENV[self::ENV_MKEY_NAME];
    if(!$config->mkey)
    {
      throw new ConnectionException("An mkey must be provided for a connection.");
    }
    $this->config = $config;
    $this->client = new Client([
        // Base URI is used with relative requests
        'base_uri' => $config->endpoint,
        'timeout'  => $config->timeout,
    ]);
  }
  
  public function simpleSale(float $amount, CardInfo $ci)
  {
    $response = $this->client->request('POST', '', [
      'form_params' => array_merge([
        'mkey'=>$this->config->mkey,
        'transtype' => 'sale',
        'amount'=>$amount,
      ], $ci->toArray())
    ]);
    $code = $response->getStatusCode();
    if($code!=200)
    {
      throw new ConnectionException("Sparrow API is not responding.");
    }
    $qs = $response->getBody()->getContents();
    $r = new Response($qs);
    return $r;
  }
  // ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 //  transtype=sale&mkey=MTA6MzM6NTYgUE0tLVBheVRhY3RpeALO&amount=9.95&cardnum=4111111111111111&cardexp=1010&cvv=999
 //  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 // 
}