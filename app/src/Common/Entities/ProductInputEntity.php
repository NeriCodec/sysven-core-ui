<?php

namespace App\src\Common\Entities;


class ProductInputEntity
{
    /**
     * Nombre del insumo
     * @var $name
     */
    public $name;

    /**
     * Cantidad del insumo (onzas, unidades, etc)
     * @var $measure
     */
    public $measure;

    /**
     * ProductInputEntity constructor.
     * @param $name
     * @param $measure
     */
    public function __construct($name, $measure)
    {
        $this->name = $name;
        $this->measure = $measure;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getMeasure()
    {
        return $this->measure;
    }

}