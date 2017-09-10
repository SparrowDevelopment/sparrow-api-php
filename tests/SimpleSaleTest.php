<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Sparrow\Connection;
use Sparrow\CardInfo;
use Carbon\Carbon;
use Sparrow\Response;

final class SimpleSaleTest extends TestCase
{
    public function testSuccess(): void
    {
      $c = new Connection(getenv('mkey'));
      
      $ci = new CardInfo([
        'number'=>'4111111111111111',
        'expiration'=>Carbon::create(2010, 10, 1, 0, 0, 0),
        'cvv'=>'999',
      ]);
      $res = $c->simpleSale(9.95, $ci);
      $this->assertEquals(1, $res->response);
      $this->assertTrue(is_string($res->transid));
      $this->assertEquals('sale', $res->type);
      $this->assertEquals('sale', $res->type);
    }
}
