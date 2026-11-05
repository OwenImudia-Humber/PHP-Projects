<?php 
abstract class Vehicle {
    protected $make, $model, $dailyRentalRate;

    public function __construct($make, $model, $dailyRentalRate) {
        $this->make = $make;
        $this->model = $model;
        $this->dailyRentalRate = $dailyRentalRate;
    }
   final public function setMake($make) {
        $this->make = $make;
    }
    public function getMake() {
        return $this->make;
    }
    public function getModel() {
        return $this->model;
    }
    public function getDailyRentalRate() {
        return $this->dailyRentalRate;
    }
    abstract public function getCategory();

}
?>