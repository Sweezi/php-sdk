<?php
/**
 *
 * @Author VOID SOFTWARE <info@void.pt>
 * @Copyright 2019-2020 VOID SOFTWARE, S.A.
 *
 */

namespace Sweezy\SDK\Tracking;


use Sweezy\SDK\BaseRequest;

class TrackingResource extends BaseRequest
{

  /**
   * @var int
   */
  private $storeId;

  public function __construct(int $storeId)
  {
    parent::__construct();
    $this->storeId = $storeId;
  }

  protected function getURL()
  {
    return "tracking";
  }

  protected function isAuthRequired()
  {
    return true;
  }


  function getTracking($trackingNumber)
  {
    return $this->preformRequest("GET", "tracking/"+$trackingNumber);
  }
}
