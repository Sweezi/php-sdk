<?php
/**
 *
 * @Author VOID SOFTWARE <info@void.pt>
 * @Copyright 2019-2020 VOID SOFTWARE, S.A.
 *
 */

namespace Sweezy\SDK;

use PHPUnit\Framework\TestCase;
use Sweezy\SDK\Plan\PlanResource;

class PlanTest extends TestCase
{


  public function testPlans()
  {

    SDK::setInstance("https://my.sweezi.pt/api", "1234", "mysecret");
    $resource = new PlanResource();
    $plans = $resource->getAll();
    $this->assertNotEmpty($plans);

    $services = $resource->getServices($plans[0]->id);
    $this->assertNotEmpty($services);

  }
}
