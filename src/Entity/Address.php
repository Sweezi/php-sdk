<?php
/**
 *
 * @Author VOID SOFTWARE <info@void.pt>
 * @Copyright 2019-2020 VOID SOFTWARE, S.A.
 *
 */

namespace Sweezy\SDK\Entity;


class Address
{
  public $city; //String
  public $countryId; //String
  public $postalCode; //String
  public $state; //String
  public $street; //String

  /**
   * Address constructor.
   * @param $city
   * @param $countryId
   * @param $postalCode
   * @param $state
   * @param $street
   */
  public function __construct($city, $countryId, $postalCode, $state, $street)
  {
    $this->city = $city;
    $this->countryId = $countryId;
    $this->postalCode = $postalCode;
    $this->state = $state;
    $this->street = $street;
  }
}
