<?php

namespace App\src\Common\Entities;


class SaleEntity
{
    public $num_articles;
    public $total;
    public $detail;
    public $user_id;

    /**
     * SaleEntity constructor.
     * @param $num_sale
     * @param $num_articles
     * @param $total
     */
    public function __construct($num_articles, $total, $detail, $user_id)
    {
        $this->num_articles = $num_articles;
        $this->total = $total;
        $this->detail = $detail;
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @return mixed
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * @return mixed
     */
    public function getNumArticles()
    {
        return $this->num_articles;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }



}