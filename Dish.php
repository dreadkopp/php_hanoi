<?php
/**
 * Created by PhpStorm.
 * User: arne
 * Date: 02.03.19
 * Time: 14:50
 */

class Dish {

    protected $size = 0;

    public function __construct ($size) {
        $this->size = $size;
    }

    public function getSize() {
        return $this->size;
    }

}
