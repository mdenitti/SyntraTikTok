<?php

class Auto {

    protected $sKleur = "";

    public function rijden() {
        return "De auto die ".$this->getKleur()." is doet zoom zoom";
    }

    public function setKleur ($value) {
        $this->sKleur = $value;
    }

    public function getKleur() {
        return $this->sKleur;
    }

}

$oAuto = new Auto;
$oAuto->setKleur('groen');
//echo $oAuto->sKleur;
echo $oAuto->rijden();
echo $oAuto->sKleur;
?>