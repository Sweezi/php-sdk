<?php
/**
 *
 * @Author VOID SOFTWARE <info@void.pt>
 * @Copyright 2019-2020 VOID SOFTWARE, S.A.
 *
 */

namespace Sweezy\SDK;

use PHPUnit\Framework\TestCase;
use Sweezy\SDK\Country\CountryResource;

class CountryTest extends TestCase
{


  public function testAllCountries()
  {

    SDK::setInstance("https://my.sweezi.pt/api", "1234", "mysecret");
    $resource = new CountryResource();
    $countries = $resource->getAll();
    $this->assertNotEmpty($countries);
  }
}
