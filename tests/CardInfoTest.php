<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Sparrow\Connection;
use Sparrow\CardInfo;
use Carbon\Carbon;
use Sparrow\Response;
use Sparrow\ConnectionException;
use Sparrow\CardInfoException;
/**
 * @covers Email
 */
final class CardInfoTest extends TestCase
{
  
  public function testBadInput()
  {
    $this->expectException(CardInfoException::class);
    $ci = new CardInfo();
  }

  public function testGoodInput()
  {
    $ci = new CardInfo([
      'number'=>'4111111111111111',
      'expiration'=>Carbon::create(2010, 10, 1, 0, 0, 0),
      'cvv'=>'999',
    ]);
    $this->assertEquals('999', $ci->cvv);
    $this->assertEquals('4111111111111111', $ci->number);
    $this->assertTrue(Carbon::create(2010, 10, 1, 0, 0, 0)->eq($ci->expiration));
  }

  public function testStaticDateInput()
  {
    $ci = new CardInfo([
      'number'=>'4111111111111111',
      'expiration'=>'1010',
      'cvv'=>'999',
    ]);
    $this->assertEquals('999', $ci->cvv);
    $this->assertEquals('4111111111111111', $ci->number);
    $dt = Carbon::create(2010, 10, 1, 0, 0, 0);
    $this->assertEquals($dt->year, $ci->expiration->year);
    $this->assertEquals($dt->month, $ci->expiration->month);
  }
 
  public function testToArray()
  {
    $ci = new CardInfo([
      'number'=>'4111111111111111',
      'expiration'=>'1010',
      'cvv'=>'999',
    ]);
    $arr = $ci->toArray();
    $this->assertEquals('999', $arr['cvv']);
    $this->assertEquals('1010', $arr['cardexp']);
    $this->assertEquals('4111111111111111', $arr['cardnum']);
  }
}
