<?php

/*
O ( OCP : Open/Closed Principe )

Принцип открытости / закрытости
Класс должна быть открытым для расшерения и закрытым для изменения
*/

interface Shape {
    public function area();
}

class Rectangle implements Shape {

    private $width;
    private $height;

    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function area() {
        return $this->width * $this->height;
    }
}

class Square implements Shape {

    private $length;

    public function __construct($length) {
        $this->length = $length;
    }

    public function area() {
        return pow($this->length, 2);
    }
}


class AreaCalculator {

    /**
     * @var Shape[]
    */
    protected $shapes;


    /**
     * @param Square[] $shapes
    */
    public function __construct(array $shapes) {
        $this->shapes = $shapes;
    }


    /**
     * @return float|int
    */
    public function sum() {

        $area = [];

        foreach($this->shapes as $shape) {
            $area[] = $shape->area();
        }

        return array_sum($area);
    }
}