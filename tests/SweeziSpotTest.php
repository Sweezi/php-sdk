<?php
/**
 *
 * @Author VOID SOFTWARE <info@void.pt>
 * @Copyright 2019-2020 VOID SOFTWARE, S.A.
 *
 */

namespace Sweezy\SDK;

use PHPUnit\Framework\TestCase;
use Sweezy\SDK\SweeziSpot\SweeziSpotResource;

class SweeziSpotTest extends TestCase
{


  public function testAllSweeziSpots()
  {

    $countryCode = "PT";
    $postalCode = "2400";
    SDK::setInstance("https://my.sweezi.pt/api", "1234", "mysecret");
    $resource = new SweeziSpotResource();
    $spots = $resource->getSweeziSpots($countryCode, $postalCode);
    $this->assertNotEmpty($spots);
  }
}
