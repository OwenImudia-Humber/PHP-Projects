<?php 
class Motorcycle extends Vehicle implements Insurable {
    private $specialLicenseRequired;

    public function __construct($make, $model, $dailyRentalRate, $specialLicenseRequired) {
        parent::__construct($make, $model, $dailyRentalRate);
        $this->specialLicenseRequired = $specialLicenseRequired;
    }

    public function getCategory() {
        return "Motorcycle";
    }

    public function getSpecialLicenseRequired() {
        return $this->specialLicenseRequired;
    }

    public function setSpecialLicenseRequired($specialLicenseRequired) {
        $this->specialLicenseRequired = $specialLicenseRequired;
    }

    public function getInsuranceCost() {
        return 12;
    }
}
?>