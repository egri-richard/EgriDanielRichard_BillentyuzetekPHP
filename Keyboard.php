<?php

class Keyboard {
    private $id;
    private $listahoz_adva;
    private $nev;
    private $ar;
    private $mechanikus;
    private $hattervilagitas;

    public function __construct(DateTime $listahoz_adva,
                                String $nev,
                                Int $ar,
                                Boolean $mechanikus,
                                Boolean $hattervilagitas) {
                                    
        $this->listahoz_adva = $listahoz_adva;
        $this->nev = $nev;
        $this->ar = $ar;
        $this->mechanikus = $mechanikus;
        $this->hattervilagitas = $hattervilagitas;
    }

    public function getId() : int {
        return $this->id;
    }

    public function getListahoz_adva() : DateTime {
        return $this->listahoz_adva;
    }

    public function getNev() : String {
        return $this->nev;
    }
}

?>