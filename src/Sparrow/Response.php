<?php
  
namespace Sparrow;

class Response 
{
  function __construct($qs)
  {
    parse_str($qs, $qs);
    foreach($qs as $k=>$v)
    {
      $this->$k = $v;
    }
    $this->response = (int)$this->response;
  }
}