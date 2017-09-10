<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Sparrow\Connection;
use Sparrow\CardInfo;
use Carbon\Carbon;
use Sparrow\Response;
use Sparrow\ConnectionException;

/**
 * @covers Email
 */
final class ConnectionTest extends TestCase
{

    public function testBadData(): void
    {
      $this->expectException(ConnectionException::class);
      $c = new Connection(123);
    }

    public function testSuccess(): void
    {
      $c = new Connection();
      $this->assertEquals($_ENV[Connection::ENV_MKEY_NAME], $c->config->mkey);
    }

    public function testNoKey(): void
    {
      $this->expectException(ConnectionException::class);
      unset($_ENV[Connection::ENV_MKEY_NAME]);
      $c = new Connection();
    }

    public function testKeyArgument(): void
    {
      $mkey = $_ENV[Connection::ENV_MKEY_NAME];
      unset($_ENV[Connection::ENV_MKEY_NAME]);
      $c = new Connection($mkey);
      $this->assertEquals($mkey, $c->config->mkey);
    }

    public function testEndpointAndMkey(): void
    {
      $c = new Connection([
        'endpoint'=>'foo.com',
        'mkey'=>'123',
      ]);
      $this->assertEquals('123', $c->config->mkey);
      $this->assertEquals('foo.com', $c->config->endpoint);
    }
    
    public function testTimeout(): void
    {
      $c = new Connection([
        'timeout'=>20,
      ]);
      $this->assertEquals(20, $c->config->timeout);
    }    
}
