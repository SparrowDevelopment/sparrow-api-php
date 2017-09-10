<?php
  
namespace Sparrow;
use Carbon\Carbon;

class CardInfo 
{
  static $required = ['number', 'expiration', 'cvv'];

  function __construct($info=[])
  {
    if(!$info)
    {
      throw new CardInfoException("You must provide card info.");
    }
    $filteredInfo = [];
    foreach(self::$required as $k)
    {
      if(!isset($info[$k]))
      {
        throw new CardInfoException("Field {$k} is required in CardInfo");
      }
      $this->$k = $info[$k];
    }
    if(is_string($this->expiration))
    {
      $this->expiration = Carbon::createFromFormat('ym', $this->expiration);
    }
  }
  
  function toArray()
  {
    return [
      'cvv'=>$this->cvv,
      'cardnum'=>$this->number,
      'cardexp'=>sprintf("%02d%02d", $this->expiration->year-2000, $this->expiration->month),
    ];
  }
  // ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 //  transtype=sale&mkey=MTA6MzM6NTYgUE0tLVBheVRhY3RpeALO&amount=9.95&cardnum=4111111111111111&cardexp=1010&cvv=999
 //  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 // 
}