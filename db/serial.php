<?php

include_once 'dbSerial.php';

class tipSerial
{
    private $id;
    private $nazov;
    private $zaner;
    private $hodnotenie;
    private $obrazok;


    public function __construct($id, $nazov, $zaner, $hodnotenie, $obrazok)
    {
        $this->id = $id;
        $this->nazov = $nazov;
        $this->zaner = $zaner;
        $this->hodnotenie = $hodnotenie;
        $this->obrazok = $obrazok;

    }

    public function getId()
    {
        return $this->id;
    }

    public function getNazov()
    {
        return $this->nazov;
    }

    public function getZaner()
    {
        return $this->zaner;
    }

    public function getHodnotenie()
    {
        return $this->hodnotenie;
    }

    public function getObrazok()
    {
        return $this->obrazok;
    }
}
