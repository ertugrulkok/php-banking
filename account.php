<?php

abstract class Account implements kontoFunctions
{
    private $name;
    private $sN;
    private $kontostand;
    protected $iban;
    private static $index = 10000; // Hilfsattribut
    public $zins;

    #Konstruktor
    function __construct($name, $sN, $kontostand)
    {
        $this->name = $name;
        $this->sN = $sN;
        $this->kontostand = $kontostand;
        self::$index++;
        $this->iban = self::setIban();
    }

    #Funktion zur Erstellung einer Iban
    function setIban()
    {
        $lastTwoSN = substr($this->sN, strlen($this->sN) - 2); // gibt mir die letzten zwei Zeichen zurück
        #echo $lastTwoSN;
        $uniqueID = self::$index;
        #echo $uniqueID;
        $randomNumber = rand(100, 999);
        #echo $randomNumber;
        $iban = ("DE" . $lastTwoSN . $uniqueID . $randomNumber);
        return $iban;
    }


    function showInfo()
    {
        echo " <br> <br> NAME: {$this->name} <br> IBAN: {$this->iban}  <br> KONTOSTAND: {$this->kontostand}€";
    }



    public function deposit($amount) // einzahlen

    {
        $this->kontostand += $amount;
        echo "Du hast $amount € eingezahlt in dein Konto. <br>";
        echo "Ihr derzeitiger Kontostand beträgt: " . $this->kontostand . "€<br>";
    }

    public function withdraw($amount)
    {
        $this->kontostand -= $amount;
        echo "Du hast $amount € ausgezahlt von deinem Konto. <br>";
        echo "Ihr derzeitiger Kontostand beträgt: " . $this->kontostand . "€<br>";
    }

    public function transfer(Account $transferTo, float $amount)
    {
        $this->kontostand -= $amount;
        echo "<br> <br> Transfering: $amount €";
        echo "<br> Ihr derzeitiger Kontostand beträgt: " . $this->kontostand . "€<br>";
        // print_r($transferTo);
        $neuerKontostand = $transferTo->kontostand + $amount;

        echo "Kontostand von {$transferTo->name} beträgt: " . $neuerKontostand;

        $transferTo->kontostand = $neuerKontostand;
    }

}

interface kontoFunctions
{
    public function setKonto();
}

#Erstellt eine Klasse mit 3 Attributen.
#Die Klasse soll eine Funktion haben. Diese Funktion soll den Nachnamen hinzufügen.
#Erzeugt ein Objekt dieser Klasse und ruft diese Funktion auf

// class Person
// {
//     public $name;
//     public $age;
//     public $gender;

//     function __construct($name, $age, $gender)
//     {
//         $this->name = $name;
//         $this->age = $age;
//         $this->gender = $gender;
//     }

//     function getFullname($surname)
//     {
//         echo $this->name . " " . $surname;
//     }

// }

// $ertosun = new Person("Sadeddin", 18, "male");
// $ertosun->getFullname("Ertosun");

?>