<?php

class Sneaker
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllSneakers()
    {
        // SQL query gebaseerd op de kolommen in je create-script
        $sql = 'SELECT  SNKR.Merk
                       ,SNKR.Model
                       ,SNKR.Type
                       ,SNKR.Prijs
                       ,SNKR.Materiaal
                       ,SNKR.Gewicht
                       ,DATE_FORMAT(SNKR.Releasedatum, "%d/%m/%Y") as Releasedatum

                FROM    Sneakers as SNKR

                ORDER BY SNKR.Prijs DESC';

        $this->db->query($sql);

        return $this->db->resultSet();
    }
}