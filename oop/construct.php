<?php

class Auto {

    private $sKleur = "";
    private $sMerk = "";
    private $sAandrijving = "";

    public function __construct ($kleur, $merk, $aandrijving) {
        $this->sKleur = $kleur;
        $this->sMerk = $merk;
        $this->sAandrijving = $aandrijving;
    }

    public function rijden() {
        return "De auto is: ".$this->sKleur." en van het merk: ".$this->sMerk;
    }

    public function __destruct() {
        echo "De auto is tegen een boom gereden!";
    }
}

$oAuto = new Auto('groen','peugeot','naft');
// Voorbeeld om een user toe te voegen via een constructor......
// Fictieve user class uiteraard!
// $user = new User('Massimo','Password','role','email');
echo $oAuto->rijden();
unset ($oAuto);