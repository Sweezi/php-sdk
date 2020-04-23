<?php
/**
 *
 * @Author VOID SOFTWARE <info@void.pt>
 * @Copyright 2019-2020 VOID SOFTWARE, S.A.
 *
 */

namespace Sweezy\SDK\SweeziOrder;


use Sweezy\SDK\BaseRequest;
use Sweezy\SDK\Common\PaginationParams;
use Sweezy\SDK\Entity\CreateCustomerOrder;
use Sweezy\SDK\GetAllPageInterface;
use Sweezy\SDK\GetOneInterface;
use Sweezy\SDK\SweeziOrder\SweeziOrderPaginationParams;

class SweeziOrderResource extends BaseRequest implements  GetOneInterface
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
    return "stores/" . $this->storeId . "/sweezi-orders";
  }

  protected function isAuthRequired()
  {
    return true;
  }

  function getTracking($id)
  {
    return $this->preformRequest("GET", $id+"/tracking");
  }


  function getAllPaginated(SweeziOrderPaginationParams $paginationParams)
  {
    return $this->preformRequest("GET", "", $paginationParams->toArray());
  }

  function getOne($id, $params = [])
  {
    return $this->preformRequest("GET", $id);
  }
}
