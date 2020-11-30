<?php
require_once "DBGegevens.php";
class Bestelling
{
    private $id;
    private $naamKlant;
    private $naamBroodje;
    public function __construct(
        $cid = null,
        $cnaamKlant = null,
        $cnaamBroodje = null
    ) {
        $this->id = $cid;
        $this->naamKlant = $cnaamKlant;
        $this->naamBroodje = $cnaamBroodje;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getNaamKlant()
    {
        return $this->naamKlant;
    }
    public function getNaamBroodje()
    {
        return $this->naamBroodje;
    }

    public function setNaamKlant($naamKlant)
    {
        $this->naamKlant = $naamKlant;
    }
    public function setNaamBroodje($naamBroodje)
    {
        $this->naamBroodje = $naamBroodje;
    }
    public function bestellen()
    {
        $dbh = new PDO(
            DBGegevens::DB_STRING,
            DBGegevens::DB_USER,
            DBGegevens::DB_PWD
        );
        $stmt = $dbh->prepare("INSERT INTO bestellingen (naamKlant, naamBroodje) VALUES
(:naamKlant, :naamBroodje)");
        $stmt->bindValue(":naamKlant", $this->naamKlant);
        $stmt->bindValue(":naamBroodje", $this->naamBroodje);
        $stmt->execute();
        $laatsteNieuweId = $dbh->lastInsertId();
        $dbh = null;
        $this->id = $laatsteNieuweId;
        return $this;
    }
}
