<?php
/**
 * Created by PhpStorm.
 * User: arne
 * Date: 02.03.19
 * Time: 14:50
 */

class Tower {

    protected $dishes = [];
    protected $name = '';


    public function __construct($name,$disks){
        $this->name = $name;
        $this->dishes = $this->create_stack($disks);
    }

    public function getCount() {
        return count($this->dishes);
    }

    public function getName() {
        return $this->name;
    }

    public function addToStack(Dish $dish) {
        $top_dish = array_key_exists(0,$this->dishes) ? $this->dishes[0] : false;

        echo "Setze Scheibe ". $dish->getSize() . " auf " . $this->getName() . PHP_EOL;

        if ($top_dish && $dish->getSize() >= $top_dish->getSize()) {
            throw new Exception('das passt so nicht... '.
                $dish->getSize(). ' auf ' .
                $top_dish->getSize()
            );
        } else {
            $this->dishes = array_merge([$dish],$this->dishes);
        }
    }

    public function removeFromStack() {
        $dish = array_shift($this->dishes);
        echo "Nehme Scheibe ". $dish->getSize() . " von " . $this->getName() . ' - ';
        return $dish;
    }

    private static function create_stack($count_disks) {
        $stack = [];
        for($i=1;$i <= $count_disks; $i++) {
            $dish = new Dish($i);
            array_push($stack,$dish);
        }
        return $stack;
    }

}