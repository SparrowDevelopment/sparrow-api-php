# Usage

```
$c = new Connection('<your Sparrow API key>');

$ci = new CardInfo([
  'number'=>'4111111111111111',
  'expiration'=>'1013',
  'cvv'=>'999',
]);
$res = $c->simpleSale(9.95, $ci);
$this->assertEquals(1, $res->response);
$this->assertTrue(is_string($res->transid));
$this->assertEquals('sale', $res->type);
$this->assertEquals('sale', $res->type);
```
# Running Tests

`phpunit --bootstrap tests/bootstra.php tests`