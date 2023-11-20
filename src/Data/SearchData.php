<?php

namespace App\Data;

use App\Entity\Carburants;


class SearchData
{
    /**
     * @var Carburants
     */

    public $carburants = [];

    /**
     * @var null|integer
     */
    public ?float $prixMax;

    /**
     * @var null|integer
     */
    public ?float $prixMin;

    /**
     * @var null|integer
     */
    public ?float $kmMin;

    /**
     * @var null|integer
     */
    public ?float $kmMax;

    /**
     * @var null|integer
     */
    public ?float $yearMin;

    /**
     * @var null|integer
     */
    public ?float $yearMax;
}