<?php
// LSP - Liskov substitution principle

namespace Problem
{
    abstract class Shape
    {
    }

    class Square extends Shape
    {

        private $a;

        /**
         * @return int
         */
        public function getA()
        {
            return $this->a;
        }
    }

    class Rectangle extends Shape
    {

        private $a;

        private $b;

        /**
         * @return int
         */
        public function getA()
        {
            return $this->a;
        }

        /**
         * @return int
         */
        public function getB()
        {
            return $this->b;
        }
    }

    class Circle extends Shape
    {

        private $r;

        /**
         * @return mixed
         */
        public function getR()
        {
            return $this->r;
        }
    }
    
    class Hexagon extends Shape{
        
    }

    class AreaCalculator
    {

        public function calculateArea(Shape $shape)
        {
            if ($shape instanceof Square) {
                return $shape->getA() * $shape->getA();
            } elseif ($shape instanceof Rectangle) {
                return $shape->getA() * $shape->getB();
            } elseif ($shape instanceof Circle) {
                return 3 * $shape->getR() * $shape->getR();
            } else {
                throw new \UnderqualifiedException(":(");
            }
        }
    }
}

//solution

namespace Solution1 {

    abstract class Shape
    {
        abstract public function calculateArea();
    }

    class Square extends Shape
    {

        private $a;

        /**
         * @return int
         */
        public function getA()
        {
            return $this->a;
        }

        public function calculateArea()
        {
            return $this->a * $this->a;
        }
    }

    class Rectangle extends Shape
    {

        private $a;

        private $b;

        /**
         * @return int
         */
        public function getA()
        {
            return $this->a;
        }

        /**
         * @return int
         */
        public function getB()
        {
            return $this->b;
        }

        public function calculateArea()
        {
            return $this->a * $this->b;
        }
    }

    class Circle extends Shape
    {

        private $r;

        /**
         * @return mixed
         */
        public function getR()
        {
            return $this->r;
        }

        public function calculateArea()
        {
            return 3.1415 * $this->r * $this->r;
        }
    }

    class AreaCalculator
    {
        public function calculateArea(Shape $shape)
        {
            return $shape->calculateArea();
        }
    }
}


namespace Solution2 {

    interface AreaComputable
    {
        public function calculateArea();
    }

    class Square implements AreaComputable
    {

        private $a;

        /**
         * @return int
         */
        public function getA()
        {
            return $this->a;
        }

        public function calculateArea()
        {
            return $this->a * $this->a;
        }
    }

    class Rectangle implements AreaComputable
    {

        private $a;

        private $b;

        /**
         * @return int
         */
        public function getA()
        {
            return $this->a;
        }

        /**
         * @return int
         */
        public function getB()
        {
            return $this->b;
        }

        public function calculateArea()
        {
            return $this->a * $this->b;
        }
    }

    class Circle implements AreaComputable
    {

        private $r;

        /**
         * @return mixed
         */
        public function getR()
        {
            return $this->r;
        }

        public function calculateArea()
        {
            return 3.1415 * $this->r * $this->r;
        }
    }

    class MineField implements AreaComputable
    {

        public function calculateArea()
        {
            return $this->recentDeaths * $this->averageMinePerSquareMeterRatio;
        }
    }

    class AreaCalculator
    {
        public function calculateArea(AreaComputable $shape)
        {
            return $shape->calculateArea();
        }
    }
}

