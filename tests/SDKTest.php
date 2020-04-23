<?php
/**
 *
 * @Author VOID SOFTWARE <info@void.pt>
 * @Copyright 2019-2020 VOID SOFTWARE, S.A.
 *
 */


namespace Sweezy\SDK;

use PHPUnit\Framework\TestCase;

class SDKTest extends TestCase
{


  public function testLogin()
  {
    SDK::setInstance("https://my.sweezi.pt/api", "1234", "mysecret");
    $sdk = SDK::getInstance();

    $token = $sdk->getToken();
    $this->assertNotNull($token, "Verify if token is returned");
    $isValid = $sdk->tokenIsValid();
    $this->assertTrue($isValid, "Token is Valid");
  }
}
