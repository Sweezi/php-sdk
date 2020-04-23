<?php
/**
 *
 * @Author VOID SOFTWARE <info@void.pt>
 * @Copyright 2019-2020 VOID SOFTWARE, S.A.
 *
 */

namespace Sweezy\SDK;


use Sweezy\SDK\Common\PaginationParams;

interface GetAllPageInterface
{
  function getAllPaginated(PaginationParams $paginationParams);
}
