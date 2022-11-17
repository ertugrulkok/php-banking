<?php
require "account.php";
class Sparkonto extends Account
{
    private $sparkontoID;
    private $sparkontoPIN;

    function __construct($name, $sN, $kontostand)
    {
        parent::__construct($name, $sN, $kontostand);
        $this->iban .= "S";
        $this->setKonto();

    }

    function setKonto()
    {
        $kontoID = "";
        $kontoPIN = "";

        for ($i = 0; $i < 6; $i++) {
            $kontoID .= mt_rand(0, 9);
        }
        for ($i = 0; $i < 4; $i++) {
            $kontoPIN .= mt_rand(0, 9);
        }

        $this->sparkontoID = $kontoID;
        $this->sparkontoPIN = $kontoPIN;

    }

    function showInfo()
    {
        parent::showInfo();
        echo "<br> KONTONUMMER: {$this->sparkontoID} <br> 
                PIN: {$this->sparkontoPIN}";
    }

}


$sparkonto1 = new Sparkonto("Ertugrul Kök", 473623782, 1000);
$sparkonto1->deposit(4000);
$sparkonto1->withdraw(1500);

$sparkonto1->showInfo();

$sparkonto2 = new Sparkonto("Hasan Sakalli", 23456423, 2000);
//$sparkonto1->compoundInterest();
$sparkonto1->transfer($sparkonto2, 500);

$sparkonto2->transfer($sparkonto1, 400);
$sparkonto2->showInfo();
$sparkonto1->showInfo();


?>