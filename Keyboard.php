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

    public function getId() : Int {
        return $this->id;
    }

    public function getListAdv() : DateTime {
        return $this->listahoz_adva;
    }

    public function getNev() : String {
        return $this->nev;
    }

    public function getAr() : Int {
        return $this->ar;
    }

    public function getMechanikus() : String {
        return $this->mechanikus ? 'igen' : 'nem';
    }

    public function getHattervil() : String {
        return $this->hattervilagitas ? 'igen' : 'nem';
    }

    public static function updateAt(Int $id, String $ujNev, Int $ujAr, Int $ujMech, Int $ujHtv) {
        global $db;
        $date = date('Y-m-d H:i:s');

        $db->prepare("UPDATE keyboards SET listahoz_adva = :ujListadv, nev = :ujNev, ar = :ujAr, mechanikus = :ujMechanikus, hattervilagitas = :ujHattervil WHERE id = :id")
            ->execute([ 'ujListadv' => $date, 'ujNev' => $ujNev, 'ujAr' => $ujAr, 'ujMechanikus' => $ujMech, 'ujHattervil' => $ujHtv, 'id' => $id]);
    }

    public static function getAll() : array {
        global $db;
        $retArr = [];

        $table = $db->query("SELECT * FROM keyboards ORDER BY listahoz_adva ASC")->fetchAll();

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