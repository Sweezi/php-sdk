<?php
/**
 *
 * @Author VOID SOFTWARE <info@void.pt>
 * @Copyright 2019-2020 VOID SOFTWARE, S.A.
 *
 */

namespace Sweezy\SDK;

use PHPUnit\Framework\TestCase;
use Sweezy\SDK\Store\StoreResource;

class StoreTest extends TestCase
{


  public function testAllStores()
  {

    SDK::setInstance("https://my.sweezi.pt/api", "1234", "mysecret");
    $resource = new StoreResource();
    $stores = $resource->getAll();
    $this->assertNotEmpty($stores);
  }
}
