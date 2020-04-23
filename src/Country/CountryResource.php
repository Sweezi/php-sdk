<?php
/**
 *
 * @Author VOID SOFTWARE <info@void.pt>
 * @Copyright 2019-2020 VOID SOFTWARE, S.A.
 *
 */

namespace Sweezy\SDK\Country;


use Sweezy\SDK\BaseRequest;
use Sweezy\SDK\GetAllInterface;

class CountryResource extends BaseRequest implements GetAllInterface
{
  protected function getURL()
  {
    return "countries";
  }

  protected function isAuthRequired()
  {
    return true;
  }

  /**
   * @param array $params
   * @return array
   */
  public function getAll($params = [])
  {
    return $this->preformRequest("GET");
  }
}
