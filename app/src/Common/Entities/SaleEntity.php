<?php

namespace App\src\Common\Entities;


class SaleEntity
{
    /**
     * @var $total
     */
    public $total;

    /**
     * @var $created_at
     */
    public $created_at;

    /**
     * @var $user_id
     */
    public $user_id;

    /**
     * SaleEntity constructor.
     * @param $total
     * @param $created_at
     * @param $user_id
     */
    public function __construct($total, $created_at, $user_id)
    {
        $this->total      = $total;
        $this->created_at = $created_at;
        $this->user_id    = $user_id;
    }

    /**
     * @return double
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->user_id;
    }
}