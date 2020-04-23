<?php
/**
 *
 * @Author VOID SOFTWARE <info@void.pt>
 * @Copyright 2019-2020 VOID SOFTWARE, S.A.
 *
 */

namespace Sweezy\SDK\Common;


class PaginationParams
{
  private $search;
  private $sort;
  private $order;
  private $startIndex;
  private $maxResults;

  /**
   * PaginationParams constructor.
   * @param $search string to search
   * @param $sort string field to order
   * @param $order string asc or desc
   * @param $startIndex int start index init=1
   * @param $maxResults int max results
   */
  public function __construct($startIndex = 0, $maxResults = 20, $search = "", $sort = "store.name", $order = "asc")
  {
    $this->search = $search;
    $this->sort = $sort;
    $this->order = $order;
    $this->startIndex = $startIndex;
    $this->maxResults = $maxResults;
  }

  public function toArray()
  {
    $array = [
      "_start" => $this->startIndex,
      "_limit" => $this->maxResults,
      "_sort" => $this->sort,
      "_order" => $this->order
    ];
    if (!empty($this->search))
      $array["_q"] = $this->search;

    return $array;
  }
}
