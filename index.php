<!DOCTYPE html>
<html>
<body>
<?php
class Shape
{
    public $name;
    public function __construct($name)
    {
        $this->name = $name;
    }
    public function show() {
        return "I am a shape. My name is $this->name ";
    }
}

class Circle extends Shape
{
    public $radius;
    public function __construct($name, $radius)
    {
        parent::__construct($name);
        $this->radius = $radius;
    }
    public function calculateArea() {
        return pi() * pow($this->radius, 2);
    }
    public function calculatePerimeter() {
        return pi() * $this->radius * 2;
    }
}

class Cylinder extends Circle
{
    public $height;
    public function __construct($name, $radius, $height)
    {
        parent::__construct($name, $radius);
        $this->height = $height;
    }
    public function calculateArea()
    {
        return parent::calculateArea() * 2 + parent::calculatePerimeter() * $this->height;
    }
    public function calculaterVolume() {
        return parent::calculateArea() * $this->height;
    }
}

class Rectangle extends Shape
{
    public $width;
    public $height;
    public function __construct($name, $width, $height)
    {
        parent::__construct($name);
        $this->width = $width;
        $this->height = $height;
    }
    public function calculateArea() {
        return $this->height * $this->width;
    }
    public function calculatePerimeter() {
        return ($this->height + $this->width) * 2;
    }
}

class Square extends Rectangle
{
    public function  __construct($name, $width)
    {
        parent::__construct($name, $width, $width, $width);
    }
}

$circle = new Circle('circle', 5);
echo $circle->show() . "- Perimeter " . $circle->calculatePerimeter() . '<br>';
echo $circle->show() . "- Area " . $circle->calculateArea() . '<br>';

$cylinder = new Cylinder('cylinder', 5, 10);
echo $cylinder->show() . "- Area " . $cylinder->calculateArea() . '<br>';
echo $cylinder->show() . "- Volume " . $cylinder->calculateVolume() . '<br>';

$rectangle = new Rectangle('rectangle', 20, 30);
echo $rectangle->show() . "- Perimeter " . $rectangle->calculatePerimeter() . '<br>';
echo $rectangle->show() . "- Area " . $rectangle->calculateArea() . '<br>';

$square = new Square('square', 50 , 50);
echo $square->show() . "- Area " . $square->calculateArea() . '<br>';
echo $square->show() . "- Perimeter " . $square->calculatePerimeter() . '<br>';


?>
</body>
</html>