<?php
require "account.php";
class Girokonto extends Account
{

    private $girokontoNummer;
    private $girokontoPIN;

    function __construct($name, $sN, $kontostand)
    {
        parent::__construct($name, $sN, $kontostand);
        $this->iban = $this->iban . "G";
        $this->setKonto();
    }

    function setKonto()
    {
        $kontoNR = "";
        $kontoPIN = "";

        for ($i = 0; $i < 12; $i++) {
            $kontoNR .= mt_rand(0, 9);
        }
        for ($i = 0; $i < 4; $i++) {
            $kontoPIN .= mt_rand(0, 9);
        }

        $this->girokontoNummer = $kontoNR;

        $this->girokontoPIN = $kontoPIN;
    }

    function showInfo()
    {
        parent::showInfo();
        echo "<br> KONTONUMMER: {$this->girokontoNummer} <br> 
                PIN: {$this->girokontoPIN}";
    }


}

$girkonto1 = new Girokonto("Metehan", 1234567, 1000);
$girkonto1->showInfo();
//$girkonto1->compoundInterest();
echo "<br>";
echo "<br>";

$girkonto2 = new Girokonto("Mehmet", 3874269324, 1000000);
$girkonto2->showInfo();
?>