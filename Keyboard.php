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
                                Int $mechanikus,
                                Int $hattervilagitas) {
                                    
        $this->listahoz_adva = $listahoz_adva;
        $this->nev = $nev;
        $this->ar = $ar;
        $this->mechanikus = $mechanikus;
        $this->hattervilagitas = $hattervilagitas;
    }

    public function getId() : int {
        return $this->id;
    }

    public function getListAdv() : DateTime {
        return $this->listahoz_adva;
    }

    public function getNev() : String {
        return $this->nev;
    }

    public function getAr() {
        return $this->ar;
    }

    public function getMechanikus() {
        return $this->mechanikus;
    }

    public function getHattervil() {
        return $this->hattervilagitas;
    }

    public static function updateAt(Int $id,
                                    String $ujNev,
                                    Int $ujAr,
                                    Boolean $ujMechanikus,
                                    Boolean $ujHattervil) {
        global $db;

        $db->prepare("  UPDATE
                        keyboards 
                        SET 
                        listahoz_adva = :ujListadv,
                        nev = :ujNev,
                        ar = :ujAr,
                        mechanikus = :ujMechanikus,
                        hattervilagitas = :ujHattervil
                        WHERE 
                        id = :id")
            ->execute([ 'ujListadv' => new DateTime, 
                        'ujNev' => $ujNev,
                        'ujAr' => $ujAr, 
                        'ujMechanikus' => $ujMechanikus, 
                        'ujHattervil' => $ujHattervil, 
                        'id' => $id]);
    }

    public static function getAll() : array {
        global $db;
        $retArr = [];

        $table = $db->query("SELECT * FROM keyboards ORDER BY listahoz_adva DESC")->fetchAll();

        foreach($table as $row) {
            $e = new Keyboard(new DateTime($row['listahoz_adva']),
                                $row['nev'],
                                $row['ar'],
                                $row['mechanikus'],
                                $row['hattervilagitas']);
            $e->id = $row['id'];
            $retArr[] = $e;
        }

        return $retArr;
    }
}

?>