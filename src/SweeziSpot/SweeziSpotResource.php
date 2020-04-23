<?php
/**
 *
 * @Author VOID SOFTWARE <info@void.pt>
 * @Copyright 2019-2020 VOID SOFTWARE, S.A.
 *
 */

namespace Sweezy\SDK\SweeziSpot;


use Sweezy\SDK\BaseRequest;

class SweeziSpotResource extends BaseRequest
{

  protected function getURL()
  {
    return "pick-me";
  }

  protected function isAuthRequired()
  {
    return true;
  }

  function getSweeziSpots($countryCode, $postalCode)
  {
    return $this->preformRequest("GET", $countryCode."/".$postalCode);
  }
}
