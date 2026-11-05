<?php 
class Car extends Vehicle implements Insurable {
    private $seats;

    public function __construct($make, $model, $dailyRentalRate, $seats) {
        parent::__construct($make, $model, $dailyRentalRate);
        $this->seats = $seats;
    }

    public function getCategory() {
        return "Car";
    }
    public function getSeats() {
        return $this->seats;
    }
    public function setSeats($seats) {
        $this->seats = $seats;
    }

    public function getInsuranceCost() {
        return 20;
    }
}
?>